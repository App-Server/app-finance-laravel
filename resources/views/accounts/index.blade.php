<x-layout title="Contas">
    <h5>Contas</h5>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0 ">
            <div class="card">
                <div class="card-body">            
                    <p class="card-text">Cadastrar contas de receitas</p>
                    <a href="{{url('/create-revenue-account')}}" class="btn btn-primary">Conta receita</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Cadastrar contas de despesas</p>
                    <a href="{{url('/create-expense-account')}}" class="btn btn-primary">Conta despesa</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>