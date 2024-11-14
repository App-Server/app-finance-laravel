<x-layout title="Receitas">
    <h5>Editar usuário</h5>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <form  action="{{ route('user.update', $user->id ) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="exampleInputText1" class="form-label">Nome completo</label>
                        <input type="text" name="name" class="form-control" id="exampleInputText1" aria-describedby="textHelp" value="{{ $user->name  ?? old('name')}} " >
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->email ?? old('email') }} ">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>