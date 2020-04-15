@extends('layouts.app')

@section('title')
    <title>Todo List</title>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="text-center my-5">Todos Page</h1>
        <div class="card card-default">
            <div class="card-header">
                Todos
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($todos as $todo)
                    <li class="list-group-item">
                        {{ $todo->name }}
                    <a href="/todos/{{ $todo->id }}" class="btn-primary btn-sm float-right mr-2" style="text-decoration: none;">View</a>
                    @if ($todo->completed == false)
                    <a href="/todos/{{ $todo->id }}/complete-todo" class="btn-success btn-sm float-right mr-2" style="text-decoration: none;">Complete Todo</a>
                    @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

