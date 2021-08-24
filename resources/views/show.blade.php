@extends('templates.template')

@section('content')
    <h1 class="text-center">Lista de Tarefas - CONTASS</h1>
    <hr>
    <div class="text-center">
        <a href="">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>
    <hr>

<div class="col-8 m-auto">
    <table class="table text-center table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">ID-user</th>
            <th scope="col">Data</th>
            <th scope="col">Descrição</th>
            <th scope="col">Usuário</th>
            <th scope="col"> Editar</th>
        </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
</div>
@endsection
