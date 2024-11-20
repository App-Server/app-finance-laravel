<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdjustmentsCorrectionsExpenseController extends Controller
{
    public function index()
    {
        return view('adjustments-corrections-expense.index');
    }
}
