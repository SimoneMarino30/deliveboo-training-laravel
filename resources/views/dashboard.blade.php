@extends('layouts.app')

@section('content')
  <div class="container">
    <h2 class="fs-4 text-secondary my-4">
      {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
      <div class="col">
        <div class="card text-bg-success">
          {{-- close button --}}
          <button type="button" class="btn-close" aria-label="Close" data-effect="fadeOut"></button>
          <div class="card-header">Welcome {{ Auth::user()->name }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            {{ __('You are logged in!') }}
          </div>
        </div>
      </div>
    </div>
    <a class="" href="{{ route('restaurants.index') }}">{{ __('Restaurants') }}</a>
  </div>
@endsection

<!-- nav-link {{ request()->routeIs('admin.restaurants*') ? 'active' : '' }} -->
