@extends('layouts.app')

@section('content')
  <section class="container text-center pt-4">

    <h1 class="my-4">{{ $restaurant->name }} - {{ $restaurant->id }}</h1>

    <div class="d-flex justify-content-center">
      {{-- CARD --}}

      <div class="card" style="width: 18rem;">
        <img src="{{ $restaurant->photo }}" class="card-img-top" alt="restaurant-pic">
        <div class="card-body">
          <h5 class="card-title">{{ $restaurant->name }}</h5>
          <p class="card-text">{{ $restaurant->address }}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">VAT number: {{ $restaurant->piva }}</span>
            </p>
          </li>
        </ul>
        <div class="card-footer">
          @forelse ($restaurant->typologies as $typology)
            <i class="{{ $typology->icon }}"></i>
            <span>{{ $typology->name }}</span>
            @unless ($loop->last)
              ,
            @else
            @endunless
          @empty
            Nessun tipology associato
          @endforelse
        </div>

        <div class="card-body">
          <a href="{{ route('restaurants.index') }}" class="btn btn-primary me-3">
            Back to list
          </a>
          <a class="card-link" href="{{ route('dishes.index', $restaurant->id) }}">
            <button class="btn btn-primary">
              Dishes
            </button>
          </a>
        </div>
      </div>
    </div>
  @endsection
