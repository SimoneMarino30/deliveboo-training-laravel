@extends('layouts.app')

@section('content')

  <body>
    <h1>
      {{ $restaurant->id ? 'Modifica ristorante - ' . $restaurant->name : 'Aggiungi un nuovo ristorante' }}
    </h1>

    @if ($isEdit)
      <form action="{{ route('restaurants.update', $restaurant->id) }}" enctype="multipart/form-data" method="POST"
        class="row gy-3 form-edit" data-modalita="edit">
        @method('PUT')
      @else
        <form action="{{ route('restaurants.store') }}" enctype="multipart/form-data" method="POST" class="gy-3 form-create"
          data-modalita="create">
    @endif
    @csrf

    <div class="form-group">
      <label for="name">Nome del Ristorante</label>
      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ $isEdit ? $restaurant->name : old('name') }}">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>



    <div class="form-group">
      <label for="address">Indirizzo</label>
      <input type="text" name="address" id="address" class="form-control"
        value="{{ old('address') ?? $restaurant->address }}" required>
    </div>

    <div class="form-group">
      <label for="piva">Partita IVA</label>
      <input type="text" name="piva" id="piva" class="form-control"
        value="{{ $isEdit ? $restaurant->piva : old('piva') }}" required>
    </div>

    <div class="form-group">
      <label for="photo">Foto del Ristorante</label>
      <input type="file" name="photo" id="photo" class="form-control-file" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>

    <a href="{{ route('restaurants.index') }}" class="btn btn-primary me-3">
      Torna alla lista
    </a>
    </form>
  @endsection
