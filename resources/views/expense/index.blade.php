<x-layout title="Despesas">
    <h5>Contas Despesas</h5>
    <x-alert />
    <div class="row">
        @foreach ($ExpenseAccountTable as $ExpenseAccount)
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">{{ $ExpenseAccount->expense_account_name }}</label>
                            </div>
                            <hr>
                            <div class="col-md-12 text-end">
                                <a href="{{ route('expense-comment.index', $ExpenseAccount->id) }}" class="btn btn-primary">Registar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>