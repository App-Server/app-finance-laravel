<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BalanceModel;

class ExtratoController extends Controller
{
    public function index()
    {
        return view('extrato.index');
    }

    public function search(Request $request)
    {
        // Validação dos dados da requisição
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        // Pegando os valores de data de início e fim
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // Buscando os dados do extrato
        $extrato = BalanceModel::with(['revenueAccount', 'expenseAccount'])
            ->whereBetween('date_of_receipt', [$startDate, $endDate])
            ->orWhereBetween('pantry_date', [$startDate, $endDate])
            ->get();
    
        // Calculando o total de receitas e despesas
        $revenueTotal = $extrato->sum('value_received');
        $expenseTotal = $extrato->sum('expense_amount');
    
        // Calculando o saldo
        $resultBalance = $revenueTotal - $expenseTotal;

        return view('extrato.index', compact('extrato', 'revenueTotal', 'expenseTotal', 'resultBalance'));
    
        // Retornando os dados para a view
        // return view('extrato.index', [
        //     'extrato' => $extrato,
        //     'revenueTotal' => $revenueTotal,
        //     'expenseTotal' => $expenseTotal,
        //     'resultBalance' => $resultBalance,
        // ]);
    }
    
}
