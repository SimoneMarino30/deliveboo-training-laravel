@extends('layouts.app')

@section('content')
<div class="container pt-5">
  @include('layouts.partials._session-message')
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Numero</th>
      <th scope="col">Tipo</th>
      <th scope="col">Minuti di cottura</th>
      <th scope="col">Grammi</th>
      <th scope="col">Actions</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($restaurants as $restaurant)
    <tr>
      <th scope="row">{{ $restaurant->id }}</th>
      <td>{{ $restaurant->name }}</td>
      <td>{{ $restaurant->address }}</td>
      <td>{{ $restaurant->piva }}</td>
      <td>{{ $restaurant->photo }}</td>
      <td>{{ $restaurant->created_at }}</td>
      <td>{{ $restaurant->updated_at }}</td>
      <td class="text-wrap">
        {{-- Dettaglio --}}
        <a class="" href="{{ route('restaurants.show', $restaurant->id) }}"><i class="fa fa-eye"></i></a>

        </a>
        {{-- Modifica --}}
        <a href="{{ route('restaurants.edit', $restaurant->id) }}" title="Modifica">
          <i class="fa fa-pencil me-2"></i>

        </a>
        {{-- Elimina --}}
        <button class="bi bi-trash3-fill btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $restaurant->id }}" title="Elimina">
          Elimina
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{-- Crea --}}
<a href="{{ route('restaurants.form') }}" title="Modifica">
  crea
  <i class="bi bi-pencil-square me-2"></i>
</a>

@endsection
@section('modals')
@foreach ($restaurants as $restaurant)
<!-- Modal -->
<div class="modal fade" id="delete-modal-{{ $restaurant->id }}" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header modal-bg">
        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Il ristorante n°
          {{ $restaurant->id }} sta per essere eliminato
        </h1>
        <a type="button" class="text-light" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-circle"></i>
        </a>
      </div>
      <div class="modal-body modal-bg">
        Vuoi eliminare definitivamente il ristorante? <br>
        La risorsa non potrà essere recuperata
      </div>
      <div class="modal-footer modal-bg">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-file-arrow-down"></i>
          Annulla
        </button>

        <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
          @csrf
          @method('delete')

          <button class="btn btn-danger">
            <i class="bi bi-trash3-fill"></i>
            Elimina
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection