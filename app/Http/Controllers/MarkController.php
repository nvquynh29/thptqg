<?php

namespace App\Http\Controllers;

use App\Models\Mark;

class MarkController extends Controller
{
    public function show($sbd)
    {
        $record = Mark::where('sbd', $sbd)->get();
        if (count($record)) {
            return response()->json($record);
        }
        return response('Not found', 404);
    }
}
