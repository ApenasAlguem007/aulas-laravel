@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

<h1 class="h1"> Alteração de Contatos </h1>
</div>

<form class="form" method="POST" action="{{ route ('contatos.update.put', $findContatos->id)}}" >
    @method('PUT')
    @csrf

<div class="mb-3">

<label class="form-label"> Nome</label>
<input value="{{$findContatos->nome}}" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome">

@if ($errors->has ('nome'))

<div class="invalid-feedback">O campo nome é obrigatório.</div>

@endif

</div>


<div class="mb-3">

<label class="form-label"> Telefone</label>
<input value="{{$findContatos->numero}}" type="text" id="telefoneMask"  class="form-control @error ('numero') is-invalid @enderror" name="numero">

@if ($errors->has ('numero'))

<div class="invalid-feedback">O campo telefone é obrigatório, de 10 à 11 digitos.</div>

@endif

</div>



<div class="mb-3">

<label class="form-label"> E-mail</label>
<input value="{{$findContatos->email}}"  type="text" class="form-control  @error ('email') is-invalid @enderror" name="email" id="email">

@if ($errors->has ('email'))

<div class="invalid-feedback">O campo e-mail é obrigatório, exemplo: teste@teste.com</div>

@endif

</div>

<button type="submit" class="btn btn-success">Alterar</button>

</form>
@endsection
