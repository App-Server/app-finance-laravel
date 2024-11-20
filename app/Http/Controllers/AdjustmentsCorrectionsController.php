<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdjustmentsCorrectionsController extends Controller
{
    public function index()
    {
        return view('adjustments-corrections.index');
    }
}
