<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    private static function getDeltaBySubject($subject)
    {
        $subject1 = array(1 => 'toan', 2 => 'ngoai_ngu');
        $subject2 = array(1 => 'van', 2 => 'ly', 3 => 'hoa', 4 => 'sinh', 5 => 'su', 6 => 'dia', 7 => 'gdcd');
        $delta = null;
        if (array_search($subject, $subject1)) {
            $delta = 0.2;
        } else if (array_search($subject, $subject2)) {
            $delta = 0.25;
        }
        return $delta;
    }
    private static function getSubjectsByGroup($group)
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
    public function show($sbd)
    {
        $record = Mark::where('sbd', $sbd)->get();
        if (count($record)) {
            return response()->json($record);
        }
        return response('Not found', 404);
    }

    public function phaseBySubject(Request $request)
    {
        $mark = 0;
        $result = [];
        $request->validate([
            'subject' => 'required|string',
        ]);
        $delta = static::getDeltaBySubject($request->subject);
        if ($delta) {
            while ($mark <= 10) {
                $count = Mark::where($request->subject, $mark)->count();
                $result[strval($mark)] = $count;
                $mark += $delta;
            }
        }
        return response()->json($result);
    }

    public function phaseByGroup(Request $request)
    {
        // $result[i] => count(x|conditional), i - 1 < x <= i
        $result = array_fill(1, 30, 0);
        $request->validate([
            'group' => 'required|string',
        ]);
        $group = $request->group;
        $subjects = static::getSubjectsByGroup($group);
        $khtn = $group == 'A' || $group == 'A1' || $group == 'B';
        $mark = Mark::select($subjects)->where('khtn', $khtn)->get();
        foreach ($mark as $key => $value) {
            $sum = $value->{$subjects[0]}+$value->{$subjects[1]}+$value->{$subjects[2]};
            $result[intval($sum)]++;
        }
        return response($result);
    }
}
