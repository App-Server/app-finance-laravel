<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="manifest" href="/manifest.json">
</head>
<body style="background-color: #f5f6ff">

    <div class="container">
        <div class="login-layout">
            <div class="login-container d-flex justify-content-center" style="margin-top: 150px; ">
                <div class="col-md-5" >                                    
                    <div class="shadow-lg " style="background-color: rgb(255, 255, 255); padding:40px;">
                        <div class="logo-login d-flex justify-content-center">
                            <img src="{{ asset('css/asset/logo.png') }}" alt="Girl in a jacket" width="350" height="90">
                        </div>
                        <div class="card-body">
                            @if ($errors->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('error') }}
                            </div>
                            @endif
                            <form action="{{ route('login.auth') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="color: rgb(0, 0, 0)">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" required>
                                </div>
                                <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label" style="color: rgb(0, 0, 0)">Senha</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" required>
                                </div><br>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Enter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        if ('serviceWorker' in navigator) {
          navigator.serviceWorker.register('/service-worker.js')
            .then(() => console.log('Service Worker registrado com sucesso!'))
            .catch((error) => console.log('Falha ao registrar o Service Worker:', error));
        }
    </script>
</body>
</html>