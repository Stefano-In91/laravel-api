@extends('layouts.admin')

@section('content')
  <h2>{{ $project->title }}</h2>

  @if ($project->type)
    <h3>Categoria: <a
        href="{{ route('admin.types.show', $project->type) }}">{{ $project->type->name }}</a></h3>
  @endif

  @if ($project->technologies->isNotEmpty())
    @foreach ($project->technologies as $technology)
      <a href="{{ route('admin.technologies.show', $technology) }}"><span
          class="badge bg-secondary">{{ $technology->name }}</span></a>
    @endforeach
  @endif

  <p>{{ $project->description }}</p>
  <img src="{{ asset("storage/$project->cover_image") }}" alt="">
  <div>
    <a href="{{ route('admin.projects.edit', $project) }}"><button
        class="btn btn-secondary">Modifica</button></a>
    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class=" d-inline">

      @csrf
      @method('DELETE')

      <button type="submit" class="btn btn-danger">Elimina</button>

    </form>
  </div>
@endsection
