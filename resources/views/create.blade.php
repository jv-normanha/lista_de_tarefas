@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($task)) Editar @else Cadastrar @endif</h1>
    <hr>
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif

    <div class="col-8 m-auto">
            @if(isset($task))
                <form name="formEdit" id="formEdit" method="post" action="{{url("tarefas/$task->id")}}">
                    @method('PUT')
                    @else
                        <form name="formCad" id="formCad" method="post" action="{{url('tarefas')}}">
                            @endif
            @csrf
            <input class="form-control" type="text" name="description" id="description" placeholder="Descrição:" value="{{$task->description ?? ''}}" required><br>
            <select class="form-control" name="user_id" id="user_id"  value="{{$user->user_id ?? ''}}"required>
                <option value="{{$task->relUsers->id ?? ''}}">{{$task->relUsers->name ?? 'usuario'}}</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select><br>
            <input class="form-control" type="date" name="date" id="date" placeholder="Data:" value="{{$task->date ?? ''}}"requireds><br>
            <input class="btn btn-primary" type="submit" value="@if(isset($task)) Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection
