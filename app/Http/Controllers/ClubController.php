<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function create()
    {
        return view('clubs.create');
    }
}
