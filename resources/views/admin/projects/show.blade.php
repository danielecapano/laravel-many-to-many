@extends('layouts.app')

@section('content')

<section>
    <div class="container">
      <h1>Projects show</h1>
    </div>
  </section>
  <section>
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img src="{{ $project->preview }}" class="card-img-top" alt="image">
            <div class="card-body">
              <h5 class="card-title fw-bold">{{ $project->title }}</h5>
              @if ($project->type)
              <p>
                <strong>
                  {{ $project->type->name }}
                </strong>
              </p>
                  
              @endif
              <p class="card-text">{{ $project->description }}</p>
              <p>Creato il {{ $project->creation_date }}</p>
              <div class="links d-flex gap-2">
                  <a href="{{ route('admin.projects.edit', $project ) }}" class="btn btn-secondary btn-sm">Edit</a>
                  <form action="{{ route('admin.projects.destroy',$project)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                  </form>

              </div>
            </div>
          </div>
    </div>
  </section>
    
@endsection