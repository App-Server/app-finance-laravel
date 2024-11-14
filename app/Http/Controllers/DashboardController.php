<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BalanceModel;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Agregando dados de receita por mês
        $revenue2024 = BalanceModel::whereYear('date_of_receipt', 2024)
            ->selectRaw('EXTRACT(MONTH FROM date_of_receipt) as month, SUM(value_received) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Agregando dados de despesa por mês
        $expense2024 = BalanceModel::whereYear('pantry_date', 2024)
            ->selectRaw('EXTRACT(MONTH FROM pantry_date) as month, SUM(expense_amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('dashboard.index', compact('revenue2024', 'expense2024'));
    }


}
