<x-layout title="Criar contas de despesas">
    <h5>Criar contas de despesas</h5>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Criar despesa
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Criar nova conta de despesa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create-expense-account.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Nome da nova conta despesa</label>
                        <input type="text" name="expense_account_name" class="form-control" id="exampleInputText1" aria-describedby="textHelp" required>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Criar conta</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <x-alert />

    <div class="row">
        @foreach ($CreateExpenseAccountTable as $CreateExpenseAccount)
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">
                                    {{ $CreateExpenseAccount->expense_account_name }}
                                </label>
                            </div>
                            <div class="col-md-12"> 
                                <label for="validationCustom04" class="form-label">
                                    Criador: {{ $CreateExpenseAccount->user ? $CreateExpenseAccount->user->name : 'User not found' }}
                                </label>
                            </div>
                            <hr>
                            <div class="col-md-12"> 
                                <a href="{{ route('create-expense-account.edit', $CreateExpenseAccount->id) }}" class="btn btn-info">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>   
</x-layout>