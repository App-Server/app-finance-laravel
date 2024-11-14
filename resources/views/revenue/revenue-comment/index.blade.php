<x-layout title="Receitas">
    <h5>Registrar entrada</h5>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <strong>Você vai cadastrar entrada:</strong>  {{ $revenue->revenue_account_name }}
            <form action="{{ route('revenue-comment.store', $revenue->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputText1" class="form-label">Valor recebido R$</label>
                        <input type="text" name="value_received" class="form-control" id="exampleInputText1" aria-describedby="textHelp" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputText1" class="form-label">Data do recebimento</label>
                        <input type="date" name="date_of_receipt" class="form-control" id="exampleInputText1" aria-describedby="textHelp" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar receita</button>
            </form>
        </div>
    </div>
</x-layout>