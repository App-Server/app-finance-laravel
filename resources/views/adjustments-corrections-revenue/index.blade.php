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
        <div class="col-md-10">
            <form class="d-flex" action="{{ route('adjustments-corrections-revenue.search') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <label for="start_date">Data inicial</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="col-md-5">
                        <label for="end_date">Data final</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <div class="col-md-2" style="margin-top: 25px;">
                        <button class="btn btn-primary" type="submit">
                            Pesquisa
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <hr>
    <div class="card" style="width: 100%;">
        <div class="card-header">
            <div class="row g-3 needs-validation">
                <div class="col-md-2">
                    <label for="validationCustom04" class="form-label"><strong>Data</strong></label>
                </div>
                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label"><strong>Conta</strong></label>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label"><strong>Credito</strong></label>
                </div>
                <div class="col-md-1">
                    <label for="validationCustom04" class="form-label"><strong>Editar</strong></label>
                </div>
            </div>
        </div>
        <div class="search-result">
            @if(isset($extrato) && $extrato->isNotEmpty())
                <ul class="list-group list-group-flush">
                    @foreach($extrato as $result)
                        <li class="list-group-item">
                            <div class="row g-3 needs-validation">
                                <div class="col-md-2">
                                    <label for="validationCustom04" class="form-label">
                                        {{ $result->pantry_date ? $result->pantry_date->format('d/m/Y') : '' }}
                                        {{ $result->date_of_receipt ? $result->date_of_receipt->format('d/m/Y') : '' }}
                                    </label>
                                </div>
                                <div class="col-md-5">
                                    <label for="validationCustom04" class="form-label">
                                        {{ $result->revenueAccount ? $result->revenueAccount->revenue_account_name : '' }}
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label" style="color: blue">{{ $result->value_received }}</label>
                                </div>
                                <div class="col-md-1">
                                    <a href="#" class="btn btn-info">Editar</a>
                                </div>
                            </div>
                        </li>
                        
                    @endforeach
                </ul>
                <!-- Exibição do Total -->
                <div class="card">
                    <div class="card-body " style="background-color: #f8f8f8">
                        <div class="row g-3 needs-validation">
                            <div class="col-md-7">
                                <label for="validationCustom04" class="form-label"><strong>Total</strong></label>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom04" class="form-label"><strong style="color: blue">{{ $revenueTotal }}</strong></label>
                            </div>
                        </div>
                        
                    </div>
                </div>
            @else
                <p>No service orders found.</p>
            @endif

        </div>
    </div>
</x-layout>