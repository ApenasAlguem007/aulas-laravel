@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

<h1 class="h1"> Contatos </h1>
</div>

<div>
    <form action="" method="GET">
    
        <input type="text" name="pesquisar" placeholder="Digite para Buscar" />
        
        <button>Pesquisar</button>

        <a type="button" href="{{ route('contatos.create.get') }}" class="btn btn-success float-end"> Incluir </a>

    </form>

    <div class="table-responsive mt-4">

@if ($findContatos -> isEmpty())

    <p>Não Existe Dados</p>

 @else

    <table class="table table-striped table-sm">
<!-- cabeçalho -->
        <thead>
            <tr>
                <th>Nome</th>
                <th>Número</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
<!-- Vai percorrer cada dado do banco de dados e armazenar em uma variavel chamada $contato -->
        @foreach ($findContatos as $contato)
        <tr>
            <!-- Na variavel com os dados armazenados, buscara por nome, numero e contato e retornará os valores deles para a tela -->
            <td>{{ $contato->nome }}</td>
            <td>{{ $contato->numero }}</td>
            <td>{{ $contato->email }}</td>


            <!-- Botão de Delete -->

            <td>
                <form action={{ route('contatos.delete', $contato->id) }} method="POST">

                @csrf 
                @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">
                    Excluir
                </button>

                </form>
                
            </td>


        </tr>
        
        @endforeach
        </tbody>

    </table>

@endif

    </div>
</div>
@endsection