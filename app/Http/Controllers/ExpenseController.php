<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CreateExpenseAccountModel;
use App\Http\Requests\StoreUpdateExpenseRequest;

class ExpenseController extends Controller
{
    public function index()
    {
        $ExpenseAccountTable = CreateExpenseAccountModel::all();
        return view('expense.index', compact('ExpenseAccountTable'));
    }

    public function store(StoreUpdateExpenseRequest $request)
    {
        $data = $request->all();
        $data['user_model_id'] = Auth::id(); 
        
        $ExpenseAccount = CreateExpenseAccountModel::create($data);
        session()->flash('success', 'Conta criada com sucesso!');
        return redirect()->route('create-expense-account.index');
    }
}
