<x-layout title="Receitas">
    <h5>Conta Receitas</h5>
    <x-alert />
    <div class="row">
        @foreach ($RevenueAccountTable as $RevenueAccount)
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">{{ $RevenueAccount->revenue_account_name }}</label>
                            </div>
                            <hr>
                            <div class="col-md-12 text-end">
                                <a href="{{ route('revenue-comment.index', $RevenueAccount->id) }}" class="btn btn-success">Entrada</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>