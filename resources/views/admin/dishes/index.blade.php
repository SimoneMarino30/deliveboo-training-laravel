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
          <a href="#" class="card-link">Another link</a>
        </div>
      </div>
    @endforeach
  </div>
@endsection
