<x-layout title="Ajustes e Correções">
    <h5>Ajustes e Correções</h5>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            <strong>Atenção:</strong> Você está prestes a realizar ajustes e correções em registros financeiros. <br>
            As ações realizadas nesta área <u>não poderão ser desfeitas</u> após serem salvas. Prossiga com cuidado.
        </div>
    </div>
    
    <h5>O que você deseja ajustar ou corrigir?</h5>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">            
                    <p class="card-text">Ajustar e corrigir registro de receitas</p>
                    <a href="{{ url('/adjustments-corrections-revenue') }}" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Ajustar e corrigir registro de despesas</p>
                    <a href="{{ url('/adjustments-corrections-expense') }}" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
