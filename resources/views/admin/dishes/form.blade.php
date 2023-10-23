@extends('layouts.app')

@section('content')

  <body>
    <h1>
      {{ $dish->id ? 'Modifica piatto - ' . $dish->name : 'Aggiungi un nuovo piatto' }}
    </h1>

    @if ($isEdit)
      <form action="{{ route('dishes.update', ['restaurant' => $restaurant_id, 'dish' => $dish]) }}"
        enctype="multipart/form-data" method="POST" class="row gy-3 form-edit" data-modalita="edit">
        @method('PUT')
      @else
        <form action="{{ route('dishes.store', $restaurant_id) }}" enctype="multipart/form-data" method="POST"
          class="gy-3 form-create" data-modalita="create">
    @endif
    @csrf

    <div class="form-group">
      <label for="name">Nome del Piatto</label>
      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ $isEdit ? $dish->name : old('name') }}">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>



    <div class="form-group">
      <label for="description">Descrizione del piatto:</label>
      <input type="text" name="description" id="description"
        class="form-control @error('description') is-invalid @enderror"
        value="{{ old('description') ?? $dish->description }}">
      @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="ingredients">Ingredients</label>
      <input type="text" name="ingredients" id="ingredients"
        class="form-control @error('ingredients') is-invalid @enderror"
        value="{{ $isEdit ? $dish->ingredients : old('ingredients') }}">
      @error('ingredients')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="price">Price</label>
      <input type="text" name="price" id="price" class="form-control-file  @error('price') is-invalid @enderror"
        value="{{ $isEdit ? $dish->price : old('price') }}">
      @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>
    <a href="{{ route('dishes.index', ['restaurant' => $restaurant_id]) }}" class="btn btn-primary me-3">
      {{-- <a href="{{ url()->previous() }}" class="btn btn-primary me-3"> --}}
      Torna alla lista
    </a>
    </form>
  @endsection
