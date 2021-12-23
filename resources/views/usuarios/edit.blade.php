@extends('templates.base')
@section('title', 'Perfil')
{{-- @section('h1', 'Página de perfil') --}} 

@section('content')
<div class="row">
    <div class="col">
    </div>
</div>
<form method="post" action="{{ route('profile.saveEdit') }}">
    <div class="row p-4" style="box-shadow: 5px 5px 15px 5px rgba(0,0,0,0.34);">
        @csrf

            <div class='col'>
                <div class="row">
                    <div class='col'>
                        <div class="row pt-4" ><input value="{{Auth::user()->nome}}" class="form-control" type="text" name="nome"/></div>
                        <div class="row text-muted p-3 pt-0">Nome:</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row pt-4" ><input class="form-control" value="{{Auth::user()->email}}" type="email" name="email"/></div>
                        <div class="row text-muted p-3 pt-0">Email:</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row pt-4" ><input class="form-control" value="{{Auth::user()->usuario}}" type="text" name="usuario" /></div>
                        <div class="row text-muted p-3 pt-0">Usuário:</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <img src="{{asset('/images/user.jpg')}}" alt="Image"/>

            </div>
            <button type="submit" class="btn btn-primary mt-3">Salvar</button>

    </div>
</form>
@endsection