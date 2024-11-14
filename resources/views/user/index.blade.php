<x-layout title="Usuário">
    <h5>Usuário</h5>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Cadastrar
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastar novo usuário</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Nome completo</label>
                        <input type="text" name="name" class="form-control" id="exampleInputText1" aria-describedby="textHelp" required>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <x-alert />

    <div class="row">
        @foreach ($users as $user)
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">{{ $user->name }}</label>
                            </div>
                            <hr>
                            <div class="col-md-1 text-end">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>