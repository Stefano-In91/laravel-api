@extends('layouts.admin')

@section('content')
  <h1>Lista Progetti</h1>
  @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
  @endif
  <a href="{{ route('admin.projects.create') }}"><button
      class="btn btn-primary my-3">Aggiungi</button></a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="col-9">Titolo</th>
        <th scope="col" class="col-3">Azioni</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $project)
        <tr>
          <th scope="row">{{ $project->id }}</th>
          <td>{{ $project->title }}</td>
          <td>
            <a href="{{ route('admin.projects.show', $project) }}"><button
                class="btn btn-primary">Dettagli</button></a>
            <a href="{{ route('admin.projects.edit', $project) }}"><button
                class="btn btn-secondary">Modifica</button></a>
            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
              class="d-inline">

              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger">Elimina</button>

            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
