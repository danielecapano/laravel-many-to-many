@extends('layouts.app')

@section('content')

<section>
    <div class="container">
      <h1>Projects create</h1>
    </div>
  </section>
  <section>

    <form action="{{ route('admin.projects.store') }}" method="POST">

        @csrf

        <div class="container">
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Insert title project" value="{{ old('title') }}">
              </div>

            <div class="mb-3">
            <label for="slug" class="form-label fw-bold">Slug</label>
            <input type="text" class="form-control" name="slug" placeholder="Slug" value="{{ old('slug') }}">
            </div>

            <div class="mb-3">
              <label for="type_id" class="form-label">Types</label>
              <select name="type_id" class="form-control" id="type_id">
                <option value="">Seleziona una tipologia</option>
                @foreach($types as $type)
                  <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
            <label for="preview" class="form-label fw-bold">Preview</label>
            <input type="text" class="form-control" name="preview" placeholder="Preview (URL)" value="{{ old('preview') }}">
            </div>

            <div class="mb-3">
            <label for="creation_date" class="form-label fw-bold">Creation Date</label>
            <input type="text" class="form-control" name="creation_date" placeholder="Creation Date" value="{{ old('creation_date') }}">
            </div>

            <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <input type="submit" class="btn btn-primary btn-sm " value="Crea">
    
        </div>
        
    </form>

    @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

    
    
  </section>
    

    
@endsection