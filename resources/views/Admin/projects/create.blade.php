@extends('layouts.admin')

@section('content')
  <h1>Crea</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control @error('title') alert alert-danger @enderror"
        id="title" name="title" maxlength="50" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Descrizione</label>
      <input type="text" class="form-control @error('description') alert alert-danger @enderror"
        id="description" name="description" required>
    </div>

    <div class="mb-3">
      <label for="cover_image" class="form-label">Immagine</label>
      <input type="file" class="form-control @error('cover_image') alert alert-danger @enderror"
        id="cover_image" name="cover_image">
    </div>

    <div class="mb-3">
      <label for="type_id" class="form-label">Categoria</label>
      <select class="form-select" name="type_id" id="type_id">
        <option value="">Senza Categoria</option>
        @foreach ($types as $type)
          <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
            {{ $type->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      @foreach ($technologies as $technology)
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="{{ $technology->slug }}}"
            name="technologies[]" value="{{ $technology->id }}">
          <label class="form-check-label"
            for="{{ $technology->slug }}}">{{ $technology->name }}</label>
        </div>
      @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
@endsection
