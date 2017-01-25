@extends('principal')
@section('title', 'Editar Conta')

@section('content')
<form class="form-horizontal" action="{{ action('ContasPagarController@update', $contas_pagar->id) }}" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>
<!-- esse input é o token, é importante para segurança -->
<input type='hidden' name='_token' value='{{{ csrf_token() }}}'>
<input type='hidden' name='editar' value='editar'>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="descricao">Nome conta</label>  
  <div class="col-md-5">
  <input value="{{$contas_pagar->descricao}}" id="descricao" name="descricao" type="text" placeholder="Nome conta" class="form-control input-md" required="">
  <span class="help-block">Nome conta</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="valor">Valor da conta</label>  
  <div class="col-md-5">
  <input value="{{$contas_pagar->valor}}" id="valor" name="valor" type="text" placeholder="Valor da conta" class="form-control input-md" required="">
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