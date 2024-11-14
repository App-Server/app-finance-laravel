<x-layout title="Receitas">
    <h5>Registrar despesa</h5>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <strong>Você vai cadastrar despesa:</strong>  {{ $expense->expense_account_name }}
            <form action="{{ route('expense-comment.store', $expense->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputText1" class="form-label">Valor pago R$</label>
                        <input type="text" name="expense_amount" class="form-control" id="exampleInputText1" aria-describedby="textHelp" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputText1" class="form-label">Data do pagamento</label>
                        <input type="date" name="pantry_date" class="form-control" id="exampleInputText1" aria-describedby="textHelp" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar despesa</button>
            </form>
        </div>
    </div>
</x-layout>