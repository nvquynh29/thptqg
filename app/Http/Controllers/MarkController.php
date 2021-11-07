<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    private function getDeltaBySubject($subject)
    {
        $subject1 = array(1 => 'toan', 2 => 'ngoai_ngu');
        $subject2 = array(1 => 'van', 2 => 'ly', 3 => 'hoa', 4 => 'sinh', 5 => 'su', 6 => 'dia', 7 => 'gdcd');
        $delta = null;
        if (array_search($subject, $subject1)) {
            $delta = 0.20;
        } else if (array_search($subject, $subject2)) {
            $delta = 0.25;
        }
        return $delta;
    }
    private function getSubjectsByGroup($group)
    {
        switch ($group) {
            case 'A':
                return array('toan', 'ly', 'hoa');
            case 'A1':
                return array('toan', 'ly', 'ngoai_ngu');
            case 'B':
                return array('toan', 'hoa', 'sinh');
            case 'C':
                return array('van', 'su', 'dia');
            case 'D':
                return array('toan', 'van', 'ngoai_ngu');
            default:
                break;
        }
        return null;
    }
    public function phaseByGroup(Request $request)
    {
        // $result[i] => count(x), i - 1 < x <= i
        $result = array_fill(1, 30, 0);
        $group = $request->query('group');
        if (isset($group)) {
            $subjects = $this->getSubjectsByGroup($group);
            $khtn = $group == 'A' || $group == 'A1' || $group == 'B';
            $mark = Mark::select($subjects)->where('khtn', $khtn)->get();
            foreach ($mark as $value) {
                $sum = $value->{$subjects[0]}+$value->{$subjects[1]}+$value->{$subjects[2]};
                $result[intval($sum)]++;
            }
            return response($result);
        }
        return response('group is required', 400);
    }
    public function show($sbd)
    {
        $record = Mark::where('sbd', $sbd)->first();
        $place = Place::where('place_id', $record->place_id)->first();
        $record->place = $place->place_name;
        if ($record) {
            return response()->json($record);
        }
        return response('Not found', 404);
    }

    public function phase(Request $request)
    {
        $placeId = $request->query('place_id');
        $subject = $request->query('subject');
        $filter = null;
        if (isset($placeId) && isset($subject)) {
            $filter = DB::table('marks');
            if ($placeId == 'all') {
                $filter = $filter->whereNotNull($subject)->pluck($subject);
            } else {
                $filter = $filter->where('place_id', $placeId)->whereNotNull($subject)->pluck($subject);
            }
            return $this->phaseBySubject($filter, $subject);
        }
        return response('All input is required', 400);
    }

    public function phaseBySubject($data, $subject)
    {
        $markArray = [];
        $countArray = [];
        $delta = $this->getDeltaBySubject($subject);
        if ($delta) {
            for ($mark = 0; $mark <= 10; $mark += $delta) {
                $markArray[] = round($mark, 2);
            }
            $length = 10 / $delta + 1;
            $countArray = array_fill(0, $length, 0);
            foreach ($data as $value) {
                $countArray[intval($value / $delta)]++;
            }
        }
        return [$markArray, $countArray];
    }

    public function phaseAllSubject(Request $request)
    {
        $subjects = ['toan', 'van', 'ngoai_ngu', 'ly', 'hoa', 'sinh', 'su', 'dia', 'gdcd'];
        $length = count($subjects);
        $data = [];
        for ($i = 0; $i < $length; $i++) {
            $request->merge(['subject' => $subjects[$i]]);
            $data[$subjects[$i]] = $this->phase($request);
        }
        return response()->json($data);
    }

    public function topTen(Request $request)
    {
        $subject = $request->query('subject');
        $desc = $request->query('desc');
        $marks = DB::table('marks')
            ->select('marks.place_id', 'places.place_name', DB::raw("round(AVG($subject),2) as temp"))
            ->groupBy('marks.place_id', 'places.place_name')
            ->join('places', 'places.place_id', '=', 'marks.place_id')
            ->orderBy('temp', $desc)
            ->take(10)
            ->get();
        return response($marks);
    }

    // suggest major api
}
