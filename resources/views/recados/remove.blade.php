@extends('templates.base')
@section('title', 'Remover Recado')
@section('h1', 'Remover Recado')

@section('content')
<div class="row">
    <div class="col">

        <div class="alert alert-danger" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <strong>Cuidado!</strong> Você está prestes a remover o recado a seguir!
        </div>

        <p>Recado: {{$recado->nome}}</p>
        <p>Você tem certeza que deseja apagar este recado para sempre?</p>

        <form method="post" action="{{ route('recados.destroy', $recado) }}">
            @csrf
            {{-- define o metodo --}}
            @method('delete')
            
            <input type="submit" class="btn btn-danger" value="Pode apagar sem medo">
            <a href="{{ route('recados') }}" class="btn btn-secondary">Desculpa, eu cliquei errado!</a>
        </form>

        

    </div>
</div>
@endsection