<x-layout title="Criar contas de receitas">
    <h5>Criar contas de receitas</h5>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Criar receita
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Criar nova conta de receita</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create-revenue-account.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Nome da nova conta de receita</label>
                        <input type="text" name="revenue_account_name" class="form-control" id="exampleInputText1" aria-describedby="textHelp" required>
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
        @foreach ($CreateRevenueAccountTable as $CreateRevenueAccount)
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">
                                    {{ $CreateRevenueAccount->revenue_account_name }}
                                </label>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">
                                    Criador: {{ $CreateRevenueAccount->user ? $CreateRevenueAccount->user->name : 'User not found' }}
                                </label>
                            </div>
                            <hr>
                            <div class="col-md-12"> 
                                <a href="{{ route('create-revenue-account.edit', $CreateRevenueAccount->id) }}" class="btn btn-info">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>    
</x-layout>