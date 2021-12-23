@extends('templates.base')
@section('title', 'Recados')
@section('h1', 'Página de Recados')

@section('content')
<div class="row">
    <div class="col">
        <p>Sejam bem-vindos à página de recados</p>

        <a class="btn btn-primary" href="{{route('recados.inserir')}}" role="button">Cadastrar recado</a>
    </div>
</div>

<div class="d-flex">

    {{-- recebe todos os recados da controller e passa por cada um --}}
    @foreach($recados as $recado)

            <div class="card" style="width: 18rem; margin: 10px">
                <div class="card-body">
                    <h5 class="card-title">{{$recado->nome}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$recado->created_at}}</h6>
                    <p class="card-text">{{$recado->comentario}}</p>
                </div>
                <div class='d-flex'>
                    <a href="{{ route('recados.edit', $recado) }}" class='m-3'>                
                        <button type='button' class='btn btn-primary'>Editar</button>
                    </a>
                    {{-- verifica se o usuário está logado --}}
                    @if (session('usuario'))                    
                        <a href="{{ route('recados.remove', $recado) }}" class='m-3'>                
                            <button type='button' class='btn btn-danger'>Remover</button>
                        </a>
                    @endif
                </div>
            </div>
    @endforeach

</div>
@endsection
