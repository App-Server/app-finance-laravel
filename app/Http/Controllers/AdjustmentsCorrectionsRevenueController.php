<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BalanceModel;

class AdjustmentsCorrectionsRevenueController extends Controller
{
    public function index()
    {
        $editRevenue = BalanceModel::all();
        return view('adjustments-corrections-revenue.index', compact('editRevenue'));
    }
}
