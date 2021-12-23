<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bakbak+One&family=Erica+One&display=swap" rel="stylesheet">
  </head>
<body>

    <header class="p-3 bg-dark text-white mb-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('home')}}" class="nav-link px-2 @if ($pagina == 'home') text-secondary @else text-white @endif">Inicial</a></li>
          <li><a href="{{route('produtos')}}" class="nav-link px-2 @if ($pagina == 'produtos') text-secondary @else text-white @endif">Produtos</a></li>
          <li><a href="{{route('recados')}}" class="nav-link px-2 @if ($pagina == 'recados') text-secondary @else text-white @endif">Recados</a></li>
          <li><a href="/usuarios" class="nav-link px-2 @if ($pagina == 'usuarios') text-secondary @else text-white @endif">Usuários</a></li>
        </ul>

        <div class="text-end">

          @if (Auth::user())
            <a href="{{ route('profile.show') }}" class='p-2 link-light'>
              Olá, {{ Auth::user()->nome}}! 
            </a>
              <a href="{{ route('logout') }}" role="button" class="btn btn-outline-danger">Sair</a>

          @else
            <a href="{{ route('login') }}" role="button" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ route('usuarios.inserir') }}" role="button" class="btn btn-warning">Cadastro</a>
          @endif
        </div>
      </div>
    </div>
  </header>

    <div class="container">
        <div class="row">
            <h1>@yield('h1')</h1>
        </div>

        <!-- Conteúdo -->
        @yield('content')

    </div>
</body>
</html>