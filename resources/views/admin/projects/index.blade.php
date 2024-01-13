@extends('layouts.app')

@section('content')

<section>
    <div class="container">
      <h1>Projects index</h1>
    </div>
  </section>

  <section>
    <div class="container">
        <table class="table table-striped">

            <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Type</th>
                  <th>Date of Creation</th>
                  
                  <th><th>
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.projects.create') }}">Nuovo</a>
                  </th></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($projects as $project)
                    <tr>
                      <td>{{ $project->id}}</td>
                      <td>
                        <a href="{{ route('admin.projects.show',$project) }}">
                        {{ $project->title  }}
                      </a>
                      </td>
                      <td>{{ $project->slug }}</td>
                      <td>{{ optional($project->type)->name }}</td>
                      <td>{{ $project->creation_date }}</td>
                      <td>
                        <a href="{{ route('admin.projects.edit',$project) }}" class="btn btn-secondary btn-sm">Edit</a>
                      </td>
                      <td>
                        <form action="{{ route('admin.projects.destroy',$project)}}" method="POST">
                          @csrf
                          @method('DELETE')
    
                          <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                        </form>
                      </td>
    
                    </tr>
                @empty
                    <tr>
                      <td>Nessun project</td>
                    </tr>
                @endforelse
              </tbody>
        </table>

    </div>
  </section>
    
@endsection