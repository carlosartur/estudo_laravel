@extends('principal')
@section('title', 'Cadastrar Conta')

@section('content')
<form class="form-horizontal" action="{{ action('ContasPagarController@salvar') }}" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Cadastro de contas</legend>
@if (count($errors) > 0 )
    <div class='alert alert-danger'>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- esse input é o token, é importante para segurança -->
<input type='hidden' name='_token' value='{{{ csrf_token() }}}'>
<input type='hidden' name='cadastrar' value='cadastrar'>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label" for="descricao">Nome conta</label>
    <div class="col-md-5">
    <input id="descricao" name="descricao" type="text" placeholder="Nome conta" class="form-control input-md" value="{{ old('descricao') }}">
    <span class="help-block">Nome conta</span>
    </div>
</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-4 control-label" for="valor">Valor da conta</label>
    <div class="col-md-5">
    <input id="valor" name="valor" type="text" placeholder="Valor da conta" class="form-control input-md" value="{{ old('valor') }}">
    <span class="help-block">Valor da conta</span>
    </div>
</div>

<!-- Button -->
<div class="form-group">
    <label class="col-md-4 control-label" for="submit">Cadastrar</label>
    <div class="col-md-4">
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</div>

</fieldset>
</form>
@stop