<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateExpenseAccountModel;
use App\Models\BalanceModel;
use App\Http\Requests\StoreUpateExpenseCommentRequest;
use Illuminate\Support\Facades\Auth;

class ExpenseComment extends Controller
{
    protected $comment;
    protected $expense;

    public function __construct(BalanceModel $comment, CreateExpenseAccountModel $expense)
    {
        $this->comment = $comment;
        $this->expense = $expense;  
    }

    public function index($expenseId)
    {
        if (!$expense = $this->expense->find($expenseId)) {
            return redirect()->back();
        }

        $expenseAccount = $expense->balances()->get();
        return view('expense.expense-comment.index', compact('expenseAccount', 'expense'));
    }

    public function store(StoreUpateExpenseCommentRequest $request, $expenseId)
    {
        if (!$expense = $this->expense->find($expenseId)) {
            return redirect()->back()->withErrors('expense not found.');
        }

        $data = $request->all();
        $data['user_model_id'] = Auth::id();
        $expense->balances()->create($data);
        session()->flash('success', 'Despesa cadastrada com sucesso!');
        return redirect()->route('expense-comment.index', $expense->id);
    }
}
