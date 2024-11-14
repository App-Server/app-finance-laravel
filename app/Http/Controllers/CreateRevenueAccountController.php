<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateRevenueAccountModel;
use App\Http\Requests\StoreUpdateCreateRevenueAccountRequest;
use Illuminate\Support\Facades\Auth;

class CreateRevenueAccountController extends Controller
{
    public function index()
    {
        $CreateRevenueAccountTable = CreateRevenueAccountModel::with('user')->get();
        return view('create-revenue-account.index', compact('CreateRevenueAccountTable'));
    }

    public function store(StoreUpdateCreateRevenueAccountRequest $request)
    {
        $data = $request->all();
        $data['user_model_id'] = Auth::id(); 

        $CreateRevenueAccount = CreateRevenueAccountModel::create($data);
        session()->flash('success', 'Conta criada com sucesso!');
        return redirect()->route('create-revenue-account.index');
    }

    public function edit($id)
    {
        if (!$CreateRevenueAccountTable = CreateRevenueAccountModel::find($id))
            return redirect()->route('create-revenue-account.edit');
        return view('create-revenue-account.edit', compact('CreateRevenueAccountTable'));
    }

    public function update(StoreUpdateCreateRevenueAccountRequest $request, $id)
    {
        $CreateRevenueAccountTable = CreateRevenueAccountModel::find($id);
        if (!$CreateRevenueAccountTable) {
            session()->flash('error', 'create-revenue-account not found!');
            return redirect()->route('create-revenue-account.index');
        }
        
        $validatedData = $request->validated();
        $data['user_model_id'] = Auth::id();        
        $CreateRevenueAccountTable->update($validatedData);

        session()->flash('success', 'Atualizado com sucesso!');
        return redirect()->route('create-revenue-account.index', $CreateRevenueAccountTable->id);
    }
}
