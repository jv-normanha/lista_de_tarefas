@extends('templates.template')

@section('content')
<h1 class="text-center">Lista de Tarefas - CONTASS</h1>
    <hr>
<div class="text-center">
    <a href="{{url('tarefas/create')}}">
        <button class="btn btn-success">Criar tarefa</button>
    </a>
</div>
<hr>
<div class="col-8 m-auto">
    @csrf
    <table class="table text-center table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Data</th>
            <th scope="col">Descrição</th>
            <th scope="col">Usuário</th>
            <th scope="col"> Opções</th>
        </tr>
        </thead>
        <tbody>
        @foreach($task as $tasks)
            @php
                $user=$tasks->find($tasks->id)->relUsers;
            @endphp
                <tr>
                    <th scope="row">{{$tasks->id}}</th>
                    <td>{{$tasks->date}}</td>
                    <td>{{$tasks->description}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                        <a href="{{url("tarefas/$tasks->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        <a href="{{url("tarefas/$tasks->id")}}" class="js-del">
                            <button class="btn  btn-danger">Apagar</button>
                        </a>
                    </td>
                </tr>
        @endforeach

        </tbody>
    </table>
</div>
@endsection
