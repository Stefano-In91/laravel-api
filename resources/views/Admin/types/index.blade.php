@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="py-4">
      <h1>Lista Categorie</h1>
      @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
      @endif
      <div class="my-4">
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary">Crea Categoria</a>
      </div>
      <table class="table table-striped table-inverse table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Slug</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($types as $type)
            <tr>
              <td>{{ $type->id }}</td>
              <td>{{ $type->name }}</td>
              <td>{{ $type->slug }}</td>
              <td>
                <a href="{{ route('admin.types.show', $type) }}" class="btn btn-success"><i
                    class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning"><i
                    class="fa-solid fa-pen"></i></a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                  data-bs-target="#modal-{{ $type->id }}">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="modal-{{ $type->id }}" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Sei sicuro di eliminare la categoria "{{ $type->name }}"?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                      data-bs-dismiss="modal">No</button>
                    <form action="{{ route('admin.types.destroy', $type) }}" method="POST"
                      class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-primary">Si</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @if (session('message'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Notifica</strong>
          <small>{{ \Carbon\Carbon::now()->diffForHumans() }}</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast"
            aria-label="Close"></button>
        </div>
        <div class="toast-body">
          {{ session('message') }}
        </div>
      </div>
    </div>
  @endif
@endsection
