<?php

namespace App\Http\Controllers;

use App\Models\CreateRevenueAccountModel;
use App\Models\BalanceModel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateRevenueCommentRequest;
use Illuminate\Support\Facades\Auth;

class RevenueComment extends Controller
{
    protected $comment;
    protected $revenue;

    public function __construct(BalanceModel $comment, CreateRevenueAccountModel $revenue)
    {
        $this->comment = $comment;
        $this->revenue = $revenue;  
    }

    public function index($revenueId)
    {
        if (!$revenue = $this->revenue->find($revenueId)) {
            return redirect()->back();
        }

        $revenueAccount = $revenue->balances()->get();
        return view('revenue.revenue-comment.index', compact('revenueAccount', 'revenue'));
    }

    public function store(StoreUpdateRevenueCommentRequest $request, $revenueId)
    {
        if (!$revenue = $this->revenue->find($revenueId)) {
            return redirect()->back()->withErrors('Revenue not found.');
        }

        $data = $request->all();
        $data['user_model_id'] = Auth::id();
        $revenue->balances()->create($data);
        session()->flash('success', 'Receita cadastrada com sucesso!');
        return redirect()->route('revenue.index', $revenue->id);
    }
}
