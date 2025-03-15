<x-layout title="Ajustes e Correçõe de Receitas">
    <h5>Ajustes e Correções de Receitas</h5>
    <a href="{{ url('/adjustments-corrections') }}" class="btn btn-info">Volta</a>
    <br><br>
    <div class="alert alert-primary" role="alert">
        A simple primary alert—check it out!
    </div>

    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            <strong>Atenção:</strong> Você está prestes a realizar ajustes e correções em registros financeiros. <br>
            As ações realizadas nesta área <u>não poderão ser desfeitas</u> após serem salvas. Prossiga com cuidado.
        </div>
    </div>

    <div class="row">
        @foreach ($editRevenue as $revenue)
            <div class="col-sm-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">{{ $revenue->revenue_account_model_id }}</label>
                            </div>
                            <hr>
                            <div class="col-md-1 text-end">
                                <a href="#" class="btn btn-info">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>