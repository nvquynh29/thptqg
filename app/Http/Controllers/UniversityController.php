<?php

namespace App\Http\Controllers;

use App\Models\University;

class UniversityController extends Controller
{
    public function index()
    {
        return University::all();
    }
}
