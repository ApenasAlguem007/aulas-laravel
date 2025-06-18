@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

<h1 class="h1"> Adicionar Contatos </h1>
</div>

<form class="form" method="POST" action="{{ route ('contatos.create.post')}}" >
    @csrf

<div class="mb-3">

<label class="form-label"> Nome</label>
<input type="text" class="form-control" name="nome">

</div>


<div class="mb-3">

<label class="form-label"> Telefone</label>
<input type="text" class="form-control" name="numero">

</div>



<div class="mb-3">

<label class="form-label"> E-mail</label>
<input type="text" class="form-control" name="email">

</div>

<button type="submit" class="btn btn-success">Salvar</button>

</form>
@endsection
