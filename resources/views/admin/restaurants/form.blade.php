<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>


<body>
  <h1>

  </h1>
  {{ $restaurant->id ? 'Modifica ristorante - ' . $restaurant->name : 'Aggiungi un nuovo ristorante' }}
  @if ($isEdit)
  <form action="{{ route('restaurants.update', $restaurant->id) }}" enctype="multipart/form-data" method="POST"
    class="row gy-3 form-edit" data-modalita="edit">
    @method('PUT')
    @else
    <form action="{{ route('restaurants.store') }}" enctype="multipart/form-data" method="POST" class="gy-3 form-create"
      data-modalita="create">
      @endif
      @csrf
      <!-- hidden user ID -->
      <!-- <div class="form-group">
        <label for="name">User ID</label>
        <input type="text" name="user_id" id="user_id" class="form-control"
          value="{{ $isEdit ? $restaurant->name : old('name') }}">
      </div> -->

      <div class="form-group">
        <label for="name">Nome del Ristorante</label>
        <input type="text" name="name" id="name" class="form-control"
          value="{{ $isEdit ? $restaurant->name : old('name') }}" required>
      </div>


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

</body>

</html>