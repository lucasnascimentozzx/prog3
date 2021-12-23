@extends('templates.base')
@section('title', 'Editar Recado')
@section('h1', 'Editar Recado')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" action="{{ route('recados.update', $recado) }}">
            @csrf
            {{-- define o metodo --}}
            @method('put')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{$recado->nome}}">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Comentário</label>
                <textarea class="form-control" id="comentario" name="comentario" rows="3">{{$recado->comentario}}</textarea>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>

    </div>
</div>
@endsection