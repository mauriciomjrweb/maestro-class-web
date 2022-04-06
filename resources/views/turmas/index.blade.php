@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('turmas.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Vagas</th>
            <th>CH</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($turmas as $turma)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $turma->nome }}</td>
            <td>{{ $turma->vagas }}</td>
            <td>{{ $turma->carga_horaria }}</td>
            <td>
                <form action="{{ route('turmas.destroy',$turma->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('turmas.show',$turma->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('turmas.edit',$turma->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $turmas->links() !!}

@endsection