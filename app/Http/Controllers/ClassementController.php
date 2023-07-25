<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClassementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $clubs = Club::all()
            ->sortByDesc('goal_difference')
            ->sortByDesc('point_count');
        return view('classement.index', compact('clubs'));
    }
}
