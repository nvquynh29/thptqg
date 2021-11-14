<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Mark;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
        $result = array_fill(0, 31, 0);
        $group = $request->input('group');
        if (isset($group)) {
            $subjects = $this->getSubjectsByGroup($group);
            $khtn = $group == 'A' || $group == 'A1' || $group == 'B';
            $marks = Mark::select($subjects)->where('khtn', $khtn)->get();
            foreach ($marks as $value) {
                $sum = $value->{$subjects[0]}+$value->{$subjects[1]}+$value->{$subjects[2]};
                $result[round($sum)]++;
            }
            return response($result);
        }
        return response('group is required', 400);
    }
    public function show($sbd)
    {
        $record = Mark::where('sbd', $sbd)->first();
        if (isset($record)) {
            $place = Place::where('place_id', $record->place_id)->first();
            $marks = [];

            if ($record) {
                $data = $record->toArray();
                foreach ($data as $key => $value) {
                    $name = $this->getSubjectName($key);
                    if (isset($name) && isset($value)) {
                        $marks[] = ['name' => $name, 'mark' => $value];
                    }
                }
                $record->place = $place->place_name;
                $suggest = $this->suggest($record, 0, 20);
                return response()->json(['data' => $record, 'suggest' => $suggest, 'marks' => $marks]);
            }
        }
        return response('Not found', 404);
    }

    private function getMaxGroup($record, $khtn)
    {
        $groups = null;
        if ($khtn) {
            $a = $record->toan + $record->ly + $record->hoa;
            $a1 = $record->toan + $record->ly + $record->ngoai_ngu;
            $b = $record->toan + $record->sinh + $record->hoa;
            $groups = array(1 => $a, 2 => $a1, 3 => $b);
        } else {
            $c = $record->van + $record->su + $record->dia;
            $d = $record->toan + $record->van + $record->ngoai_ngu;
            $groups = array(4 => $c, 5 => $d);
        }
        $point = max($groups);
        $maxGroupId = array_keys($groups, $point);
        $res = ['group_id' => $maxGroupId, 'point' => $point];
        return $res;
    }

    public function suggest($record, $start, $count)
    {
        if (Cache::has("suggest-$record->sbd")) {
            $data = json_decode(Cache::get("suggest-$record->sbd"));
            return array_slice($data, $start, $count);
        }
        $khtn = $record->khtn;
        $maxGroup = $this->getMaxGroup($record, $khtn);
        $groupName = Group::findOrFail($maxGroup['group_id'])->first()->name;
        $point = round($maxGroup['point'], 2);
        $filter = DB::table('major_group')
            ->select('majors.major_code', 'majors.major_name', 'universities.uni_name', 'standard_point',
                DB::raw("round(($point - standard_point),2) as delta"))
            ->where('group_id', '=', $maxGroup['group_id'])
            ->join('majors', 'majors.id', '=', 'major_group.major_id')
            ->join('universities', 'majors.uni_code', '=', 'universities.uni_code')
            ->havingRaw('delta <= ?', [3])
            ->orderBy('delta', 'desc');
        $store = $filter->get();
        $res = $filter->offset($start)->take($count)->get();
        foreach ($res as $value) {
            $value->group = $groupName;
            $value->point = $point;
        }
        foreach ($store as $value) {
            $value->group = $groupName;
            $value->point = $point;
        }
        Cache::forever("suggest-$record->sbd", json_encode($store));
        return $res;
    }

    public function suggestMajors(Request $request)
    {
        $request->validate(['sbd' => 'string|required']);
        $start = 0;
        $count = 20;
        if ($request->has('start') && $request->has('count')) {
            $start = $request->input('start');
            $count = $request->input('count');
        }
        $record = Mark::where('sbd', $request->sbd)->first();
        if (isset($record)) {
            return $this->suggest($record, $start, $count);
        }
        return response('Not found', 404);
    }

    public function phase(Request $request)
    {
        $placeId = $request->input('place_id');
        $subject = $request->input('subject');
        $delta = $this->getDeltaBySubject($subject);
        if (isset($placeId) && isset($subject)) {
            if ($subject == 'all') {
                return $this->phaseAllSubject($request);
            }
            $filter = DB::table('marks');
            $markArray = [];
            $countArray = [];
            if ($placeId != 'all') {
                $filter->where('place_id', $placeId);
            }
            for ($mark = 0; $mark <= 10; $mark += $delta) {
                $markArray[] = round($mark, 2);
                $countArray[] = $filter->where($subject, $mark)->count();
            }
            return response()->json([$subject => ['data' => [$markArray, $countArray], 'name' => $this->getSubjectName($subject)]]);
        }
        return response('All input is required', 400);
    }

    // public function phaseBySubject($data, $subject)
    // {
    //     $markArray = [];
    //     $countArray = [];
    //     $delta = $this->getDeltaBySubject($subject);
    //     if ($delta) {
    //         for ($mark = 0; $mark <= 10; $mark += $delta) {
    //             $markArray[] = round($mark, 2);
    //         }
    //         $length = 10 / $delta + 1;
    //         $countArray = array_fill(0, $length, 0);
    //         foreach ($data as $value) {
    //             if (isset($value)) {
    //                 $countArray[round($value / $delta)]++;
    //             }
    //         }
    //     }
    //     return response()->json([$subject => ['data' => [$markArray, $countArray], 'name' => $this->getSubjectName($subject)]]);
    // }

    private function getSubjectName($code)
    {
        $subjectNames = [
            'toan'      => 'Toán',
            'van'       => 'Ngữ văn',
            'ngoai_ngu' => 'Ngoại ngữ',
            'ly'        => 'Vật lý',
            'hoa'       => 'Hóa học',
            'sinh'      => 'Sinh học',
            'su'        => 'Lịch sử',
            'dia'       => 'Địa lý',
            'gdcd'      => 'Giáo dục công dân',
        ];
        if (array_key_exists($code, $subjectNames)) {
            return $subjectNames[$code];
        }
        return null;
    }

    public function phaseAllSubject(Request $request)
    {
        $subjects = ['toan', 'van', 'ngoai_ngu', 'ly', 'hoa', 'sinh', 'su', 'dia', 'gdcd'];
        $length = count($subjects);
        $data = [];
        for ($i = 0; $i < $length; $i++) {
            $request->merge(['subject' => $subjects[$i]]);
            $data[] = $this->phase($request)->original;
        }
        return $data;
    }

    public function topTen(Request $request)
    {
        $subject = $request->input('subject');
        $sort = $request->input('desc');
        if (isset($subject) && isset($sort)) {
            if (Cache::has("top-ten-$subject-$sort")) {
                return Cache::get(json_decode("top-ten-$subject-$sort"));
            } else {
                $desc = $sort == 'desc' ? 1 : 0;
                $marks = DB::select("call thptqg.top_ten('$subject', $desc);");
                $data = ['name' => $this->getSubjectName($subject), 'data' => $marks];
                Cache::forever("top-ten-$subject-$sort", json_encode($data));
                return response($data);
            }
        }
        return response('All input is require', 400);
    }

    public function topTenAll(Request $request)
    {
        $sort = $request->input('desc');
        if (isset($sort)) {
            if (Cache::has("top-ten-all-$sort")) {
                return Cache::get("top-ten-all-$sort");
            } else {
                $subjects = ['toan', 'van', 'ngoai_ngu', 'ly', 'hoa', 'sinh', 'su', 'dia', 'gdcd'];
                $length = count($subjects);
                $data = [];
                for ($i = 0; $i < $length; $i++) {
                    $request->merge(['subject' => $subjects[$i]]);
                    $name = $this->getSubjectName($subjects[$i]);
                    $data[$subjects[$i]] = ['data' => $this->topTen($request)->original, 'name' => $name];
                }
                Cache::forever("top-ten-all-$sort", $data);
                return response()->json($data);
            }
        }
        return response('All input is require', 400);
    }

    private function getPoint($sbd, $group)
    {
        $subjects = $this->getSubjectsByGroup($group);
        $marks = Mark::select($subjects)->where('sbd', $sbd)->first();
        if (isset($marks)) {
            $point = 0;
            for ($i = 0; $i < 3; $i++) {
                if (!isset($marks->{$subjects[$i]})) {
                    return null;
                }
                $point += $marks->{$subjects[$i]};
            }
            return round($point, 2);
        }
        return response('Not found', 404);
    }

    public function searchMajor(Request $request)
    {
        $group_id = $request->input('group_id');
        $sbd = $request->input('sbd');
        $major = $request->input('major');
        $uni = $request->input('uni');
        $start = $request->has('start') ? $request->input('start') : 0;
        $count = $request->has('count') ? $request->input('count') : 20;
        if (isset($group_id) || isset($major) || isset($uni)) {
            $filter = DB::table('major_group')
                ->select('majors.major_code', 'majors.major_name', 'universities.uni_name', 'groups.name as group', 'standard_point')
                ->join('groups', 'groups.id', '=', 'major_group.group_id')
                ->join('majors', 'majors.id', '=', 'major_group.major_id')
                ->join('universities', 'majors.uni_code', '=', 'universities.uni_code');
            if ($uni != '') {
                $filter->where('universities.uni_code', '=', $uni);
            }
            if ($group_id != 'all') {
                $filter->where('major_group.group_id', '=', $group_id);
            }
            if ($major != '') {
                $filter->where(function ($query) use ($major, $uni) {
                    $query->where('majors.major_code', '=', $major)
                        ->orWhere('majors.major_name', 'LIKE', "%$major%");
                    if ($uni != '') {
                        $query->orWhere('universities.uni_name', 'LIKE', "%$uni%");
                    }
                });
            }
            $data = $filter
                ->offset($start)
                ->take($count)
                ->get();
            $result = [];
            foreach ($data as $value) {
                $point = $this->getPoint($sbd, $value->group);
                if ($point) {
                    $value->point = $point;
                    $value->delta = round($point - $value->standard_point, 2);
                    $result[] = $value;
                }
            }
            return $result;
        }
        return response('All input is require', 400);
    }
}
