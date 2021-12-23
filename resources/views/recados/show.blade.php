{{-- cries essa página mas desiste de utilziar ela --}}

@extends('templates.base')
@section('title', 'Visualizar recado')

@section('content')
<div class="row">
    
    <div class="col">
        <h1 style="">{{ $recado->nome }}</h1>

        <p>{{ $recado->comentario }}</p>
    </div>
</div>
@endsection