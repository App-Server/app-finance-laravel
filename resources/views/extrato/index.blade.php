<x-layout title="Extrato">
    <h5>Extrato</h5>
    <div class="row">
        <div class="col-md-10">
            <form class="d-flex" action="{{ route('extrato.search') }}" method="POST">
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
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label"><strong>Conta</strong></label>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label"><strong>Debito</strong></label>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label"><strong>Credito</strong></label>
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
                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">
                                        {{ $result->revenueAccount ? $result->revenueAccount->revenue_account_name : '' }}
                                        {{ $result->expenseAccount ? $result->expenseAccount->expense_account_name : '' }}
                                    </label>
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label" style="color: brown">{{ $result->expense_amount }}</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label" style="color: blue">{{ $result->value_received }}</label>
                                </div>
                            </div>
                        </li>
                        
                    @endforeach
                </ul>
                <!-- Exibição do Total -->
                <div class="card">
                    <div class="card-body " style="background-color: #f8f8f8">
                        <div class="row g-3 needs-validation">
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label"><strong>Total</strong></label>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="validationCustom04" class="form-label"><strong style="color: brown">{{ $expenseTotal }}</strong></label>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom04" class="form-label"><strong style="color: blue">{{ $revenueTotal }}</strong></label>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3 needs-validation">
                            <div class="col-md-11">
                                <label for="validationCustom04" class="form-label"><strong>Saldo</strong></label>
                            </div>
                            <div class="col-md-1">
                                <label for="validationCustom04" class="form-label"><strong >{{ $revenueTotal - $expenseTotal }}</strong></label>
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