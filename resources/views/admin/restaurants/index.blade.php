@extends('layouts.app')

@section('content')
  <div class="container pt-5">
    {{-- messaggio creazione o cancellazione --}}
    @include('layouts.partials._session-message')

  </div>
  <div class="searchBar">
    <form class="d-flex" method="GET" action="restaurants" role="search">
      <button class="btn btn-outline-secondary" type="submit">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
      <input class="form-control me-2" type="search" name="query" id="query" value="{{ Request::get('query') }}"
        placeholder="Search For Restaurant Name" aria-label="Search" />
    </form>
    {{-- Crea --}}
    <a href="{{ route('restaurants.create') }}" title="Crea">
      <button class="btn btn-success">crea</button>
      <i class="bi bi-pencil-square me-2"></i>
    </a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Piatti</th>
        <th scope="col">Indirizzo</th>
        <th scope="col">Partita iva</th>
        <th scope="col">Published</th>
        <th scope="col">Typology</th>
        <th scope="col">Foto</th>
        <th scope="col">show</th>
        <th scope="col">edit</th>
        <th scope="col">elimina</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($restaurants as $restaurant)
        <tr>
          <td>{{ $restaurant->name }}</td>
          <td scope="row">
            {{-- piatti --}}
            <a class="" href="{{ route('dishes.index', $restaurant->id) }}">
              <button class="btn btn-primary">
                Piatti
              </button>
            </a>
          </td>
          <td>{{ $restaurant->address }}</td>
          <td>{{ $restaurant->piva }}</td>
          <td>
            <span class="{{ $restaurant->visible ? 'text-success' : 'text-danger' }}">
              {!! $restaurant->getIconHTML() !!}
            </span>
          </td>

          <td>
            @forelse ($restaurant->typologies as $typology)
              <i class="{{ $typology->icon }}"></i>
              {{ $typology->name }}
              @unless ($loop->last)
                ,
              @endunless

            @empty
              X
            @endforelse
          </td>
          <td>{{ $restaurant->photo }}</td>
          <td>{{-- Dettaglio --}}
            <a class="" href="{{ route('restaurants.show', $restaurant->id) }}">
              <button class="btn btn-warning">
                <i class="fa-solid fa-display"></i>
              </button>
            </a>
          </td>
          <td>{{-- Modifica --}}
            <a href="{{ route('restaurants.edit', $restaurant->id) }}" title="Modifica">
              <button class="btn btn-primary">
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </a>
          </td>
          <td>
            {{-- Elimina --}}
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $restaurant->id }}"
              title="Elimina">
              <i class="fa-solid fa-trash"></i>
            </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{-- Messaggio empty research --}}
  @if (isset($message))
    <div class="alert alert-info d-flex justify-content-between">
      {{ $message }}
      <a href="{{ route('restaurants.index') }}" title="Back to the List">
        <span>Back to List</span>
        <i class="fa fa-arrow-left me-2"></i>
      </a>
    </div>
  @endif
@endsection
@section('modals')
  @foreach ($restaurants as $restaurant)
    <!-- Modal -->
    <div class="modal fade" id="delete-modal-{{ $restaurant->id }}" tabindex="-1" data-bs-backdrop="static"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            Vuoi eliminare definitivamente il ristorante '{{ $restaurant->name }}'? <br>
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
