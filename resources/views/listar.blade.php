@extends('principal')
@section('title', 'Listagem de Contas')

@section('content')
<script type='text/javascript'>
    function apagar(url) {
        if (confirm("Deseja apagar esse registro?")) {
            window.location = url;
        }
    }
</script>
@if(old('cadastrar'))
    <div class="alert alert-success">Conta {{old('descricao')}} cadastrada com sucesso. </div><br>
@endif
@if(old('editar'))
    <div class="alert alert-success">Conta {{old('descricao')}} editada com sucesso. </div><br>
@endif

<h1>Lista de contas para pagar</h1>
<table class='table table-striped table-bordered table-hover'>
    <tr>
        <td>ID</td>
        <td>Descrição</td>
        <td>Valor</td>   
        <td colspan='2'>Ação</td>                     
    </tr>
@foreach ($contas_pagar as $value)
    <tr>
        <td> {{ $value->id }} </td>
        <td> {{ $value->descricao }} </td>
        <td> {{ $value->valor }} </td>
        <td><a class='btn btn-small btn-primary' href="{{ action("ContasPagarController@editar", $value->id) }}">Editar</a></td>        
        <td><a class='btn btn-small btn-danger' href="#" onclick="apagar('{{ action("ContasPagarController@apagar", $value->id) }}')">Apagar</a></td>                
    </tr>
@endforeach
</table>
<a class='btn btn-small btn-info' href="{{ action("ContasPagarController@cadastrar") }}">Cadastrar</a>        
@stop