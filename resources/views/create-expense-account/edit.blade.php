<x-layout title="Editar contas de despesas">
    <h5>Editar contas de despesas</h5>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <form action="{{ route('create-expense-account.update', $CreateExpenseAccountTable->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Atualizar conta de despesa</label>
                    <input type="text" name="expense_account_name" class="form-control" id="exampleInputText1" aria-describedby="textHelp" value="{{ $CreateExpenseAccountTable->expense_account_name }}" required>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Atualizar conta</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>