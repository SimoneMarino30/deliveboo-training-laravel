<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <section class="container text-center pt-4">

    <h1 class="my-4">Dettaglio - {{ $restaurant->id }}</h1>

    <div class="d-flex justify-content-center">
      <a href="{{ route('restaurants.index') }}" class="btn btn-primary me-3">
        Torna alla lista
      </a>




      <div class="">
        <div class="">
          <strong>
            {{ $restaurant->name }}
          </strong>
        </div>

        <div class="">


          <div class="">
            <div class="">
              <p class="">
                <strong>Camere:</strong>
                <br>
              <div>{{ $restaurant->address }}</div>
              </p>
            </div>

            <div class="">
              <p class="">
                <strong>Letti:</strong>
                <br>
                <span>{{ $restaurant->piva }}</span>
              </p>
            </div>

            <div class="">
              <p class="">
                <strong>Bagni:</strong>
                <br>
                <span>{{ $restaurant->photo }}</span>
              </p>
            </div>

            <div class="col-4">
              <p class="my-col-text">
                <strong>Prezzo:</strong>
                <br>
                <span>{{ $restaurant->created_at }}</span>
              </p>
            </div>

            <div class="col-4">
              <p class="my-col-text">
                <strong>Superficie:</strong>
                <br>
                <span>{{ $restaurant->updated_at }}</span>
              </p>
            </div>



</body>

</html>