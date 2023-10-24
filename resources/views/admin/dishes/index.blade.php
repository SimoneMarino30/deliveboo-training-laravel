@extends('layouts.app')

@section('content')
  {{-- messaggio creazione o cancellazione --}}
  @include('layouts.partials._session-message')
  <h1>benvenuto in dishes index</h1>
  {{-- back index --}}
  <button class="btn btn-warning my-5">
    <a class="" href="{{ route('restaurants.index') }}"><i class="fa-solid fa-arrow-left"></i>
    </a>
  </button>
  {{-- creazione dish --}}
  <a href="{{ route('dishes.create', $restaurant_id) }}" title="Crea un nuovo piatto">
    crea
    <i class="bi bi-pencil-square me-2"></i>
  </a>
  {{-- @dd($restaurant_id) --}}
  {{-- dish card --}}
  <div class="d-flex flex-wrap" style="border: 2px dashed orange;">
    @foreach ($dishes as $dish)
      <div class="card m-3" style="border: 2px dashed blue; width: 18rem">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $dish->name }} - {{ $dish->id }}</h5>
          <p class="card-text">
            {{ $dish->description }}
          </p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{ $dish->ingredients }}</li>
          <li class="list-group-item">{{ $dish->price }}</li>
          <li class="list-group-item">{{ $dish->visible }}</li>
        </ul>
        <div class="card-body">
          {{-- edit dish --}}
          <a href="{{ route('dishes.edit', ['restaurant' => $restaurant_id, 'dish' => $dish->id]) }}"
            title="Modifica un piatto">
            MODIFICA
            <i class="bi bi-pencil-square me-2"></i>
          </a>
          {{-- Elimina --}}
          <button class="bi bi-trash3-fill btn btn-danger" data-bs-toggle="modal"
            data-bs-target="#delete-modal-{{ $dish->id }}" title="Elimina">
            Elimina
          </button>
        </div>
      </div>
    @endforeach
  </div>
@endsection

@section('modals')
  @foreach ($dishes as $dish)
    <!-- Modal -->
    <div class="modal fade" id="delete-modal-{{ $dish->id }}" tabindex="-1" data-bs-backdrop="static"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header modal-bg">
            <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Il piatto n°
              {{ $dish->id }} sta per essere eliminato
            </h1>
            <a type="button" class="text-light" data-bs-dismiss="modal" aria-label="Close">
              <i class="bi bi-x-circle"></i>
            </a>
          </div>
          <div class="modal-body modal-bg">
            Vuoi eliminare definitivamente il piatto? <br>
            La risorsa non potrà essere recuperata
          </div>
          <div class="modal-footer modal-bg">

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="bi bi-file-arrow-down"></i>
              Annulla
            </button>

            <form action="{{ route('dishes.destroy', ['restaurant' => $restaurant_id, 'dish' => $dish]) }}"
              method="POST">
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
