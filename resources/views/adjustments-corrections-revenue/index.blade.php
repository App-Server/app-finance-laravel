<x-layout title="Ajustes e Correçõe de Receitas">
    <h5>Ajustes e Correções de Receitas</h5>
    <a href="{{ url('/adjustments-corrections') }}">Volta</a>
    <div class="alert alert-primary" role="alert">
        A simple primary alert—check it out!
    </div>

    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            <strong>Atenção:</strong> Você está prestes a realizar ajustes e correções em registros financeiros. <br>
            As ações realizadas nesta área <u>não poderão ser desfeitas</u> após serem salvas. Prossiga com cuidado.
        </div>
    </div>
</x-layout>