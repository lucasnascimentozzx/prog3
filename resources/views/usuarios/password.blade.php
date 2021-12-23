@extends('templates.base')
@section('title', 'Mudar senha')

@section('content')

<form method="post" action="{{ route('profile.savePassword') }}">
    <div class="row p-4" style="box-shadow: 5px 5px 15px 5px rgba(0,0,0,0.34);">
        <div class="row">
            <div class="col">
                @if($erro)
                    <h3 class="text-warning">{{$erro}}</h3>
                @endif

            </div>
        </div>
        @csrf

            <div class='col'>
                <div class="row">
                    <div class='col'>
                        <div class="row pt-4" ><input class="form-control" type="password" type="password" name="oldPassword"/></div>
                        <div class="row text-muted p-3 pt-0">Senha atual:</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row pt-4" ><input class="form-control" type="password" name="newPassword"/></div>
                        <div class="row text-muted p-3 pt-0">Nova senha:</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row pt-4" ><input class="form-control" type="password" name="newPasswordConfirm"/></div>
                        <div class="row text-muted p-3 pt-0">Confirme sua nova senha:</div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Salvar</button>

    </div>
</form>
@endsection