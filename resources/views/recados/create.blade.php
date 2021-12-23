@extends('templates.base')
@section('title', 'Inserir Recado')
@section('h1', 'Inserir Recado')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" action="{{ route('recados.gravar') }}">
            @csrf
            {{-- input para o nome --}}
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            
            {{-- input para o comentário --}}
            <div class="mb-3">
                <label for="comentario" class="form-label">Comentário</label>
                <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>

    </div>
</div>
@endsection