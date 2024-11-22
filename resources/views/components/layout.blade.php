<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="manifest" href="/manifest.json">
    <title>{{ $title ?? 'Default Title' }}</title>
</head>
<body style="background-color: #f1f2f5">
    
    <nav class="navbar navbar-expand-lg bg-body fixed-top" >
        <div class="container">
          <a href="{{url('/dashboard')}}"><img src="{{ asset('css/asset/logo.png') }}" alt="Girl in a jacket" width="175" height="50"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " href="{{url('/dashboard')}}" {{ Request::is('dashobard') ? 'active' : '' }}>Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/revenue')}}" {{ Request::is('revenue') ? 'active' : '' }}>Receitas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/expense')}}" {{ Request::is('expense') ? 'active' : '' }}>Despesas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/accounts')}}" {{ Request::is('accounts') ? 'active' : '' }}>Contas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/extrato')}}" {{ Request::is('extrato') ? 'active' : '' }}>Extrato</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  @if (Auth::check())
                    Olá {{ Auth::user()->name }}
                  @endif
                </a>
                <ul class="dropdown-menu">
                  <li class="nav-item">
                    <a class="dropdown-item" href="{{url('/user')}}" {{ Request::is('user') ? 'active' : '' }}>Usuários</a>
                  </li>
                  <li class="nav-item">
                    <a class="dropdown-item" href="{{url('/adjustments-corrections')}}" {{ Request::is('adjustments-corrections') ? 'active' : '' }}>Ajustes e Correções</a>
                  </li>
                  <li><a href="{{ url('/login') }}" class="dropdown-item">Sair</a></li>
                </ul>
              </div>
            </form>
          </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 90px">
        @vite('resources/js/app.js', 'resources/css/app.js')
        {{$slot}}
    </div>

    <div class="footer" style="margin-top: 100px"></div>
    
    <script src="{{ asset('js/app.js') }}"></script>
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