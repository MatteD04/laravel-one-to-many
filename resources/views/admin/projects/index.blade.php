@extends('layouts.admin')

@section('content')
    <h1>Tutti i progetti:</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Client name</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->client_name }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="mx-1">
                                <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">info</a>
                            </div>
                            <div class="mx-1">
                                <a class="link-warning" href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">modifica</a>
                            </div>
                            <div class="mx-1">
                                <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

@endsection