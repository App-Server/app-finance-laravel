<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateRevenueAccountModel;
use App\Http\Requests\StoreUpdateRevenueRequest;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    public function index()
    {
        $RevenueAccountTable = CreateRevenueAccountModel::all();
        return view('revenue.index', compact('RevenueAccountTable'));
    }

    public function store(StoreUpdateRevenueRequest $request)
    {
        $data = $request->all();
        $data['user_model_id'] = Auth::id(); 

        $RevenueAccount = CreateRevenueAccountModel::create($data);
        session()->flash('success', 'Conta criada com sucesso!');
        return redirect()->route('create-revenue-account.index');
    }
}
