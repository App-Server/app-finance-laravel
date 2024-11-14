<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateExpenseAccountModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUpdateCreateExpenseAccountRequest;

class CreateExpenseAccountController extends Controller
{
    public function index()
    {
        $CreateExpenseAccountTable = CreateExpenseAccountModel::with('user')->get();
        return view('create-expense-account.index', compact('CreateExpenseAccountTable'));
    }

    public function store(StoreUpdateCreateExpenseAccountRequest $request)
    {
        $data = $request->all();
        $data['user_model_id'] = Auth::id(); 

        $CreateExpenseAccount = CreateExpenseAccountModel::create($data);
        session()->flash('success', 'Conta criada com sucesso!');
        return redirect()->route('create-expense-account.index');
    }

    public function edit($id)
    {
        if (!$CreateExpenseAccountTable = CreateExpenseAccountModel::find($id))
            return redirect()->route('create-expense-account.edit');
        return view('create-expense-account.edit', compact('CreateExpenseAccountTable'));
    }

    public function update(StoreUpdateCreateExpenseAccountRequest $request, $id)
    {
        $CreateExpenseAccountTable = CreateExpenseAccountModel::find($id);
        if (!$CreateExpenseAccountTable) {
            session()->flash('error', 'create-expense-account not found!');
            return redirect()->route('create-expense-account.index');
        }
        
        $validatedData = $request->validated();
        $data['user_model_id'] = Auth::id();        
        $CreateExpenseAccountTable->update($validatedData);

        session()->flash('success', 'Atualizado com sucesso!');
        return redirect()->route('create-expense-account.index', $CreateExpenseAccountTable->id);
    }
}
