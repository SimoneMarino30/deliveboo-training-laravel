@extends('layouts.app')

@section('content')
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
      value="{{ old('address') ?? $restaurant->address }}">
    @error('address')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="piva">Partita IVA</label>
    <input type="text" name="piva" id="piva" class="form-control"
      value="{{ $isEdit ? $restaurant->piva : old('piva') }}">
    @error('piva')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="formFileSm" class="form-label">Upload Foto</label>
    <input class="form-control form-control-sm" id="formFileSm" type="file">
  </div>

  <div class="col-md-2 d-flex flex-column justify-content-center align-items-center">
    <label for="visibility" class="form-check-label">Pubblicato</label>
    <div class="form-check">
      <input type="radio" name="visibility" id="visibility"
        class="form-check-input @error('visibility') is-invalid @enderror" @checked(old('visibility', $restaurant->visibility)) value="1" />
      @error('visibility')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>

  {{-- * MODALE TIPOLOGIE AGGIUNTIVE --}}
  <div class="col-md-4 d-flex justify-content-center align-items-center">
    <div class="ms-auto">
      {{-- * Servizi  --}}
      @if (count($typologies) > 0)
        {{-- * Button trigger modal --}}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#service-model">
          ➕ Tipologie
        </button>

        {{-- ! Modal Typologies --}}
        <div id="service-model" class="modal fade text-start" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
          aria-modal="true" role="dialog">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Aggiungi più
                  tipologie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-check-label d-block mb-2 @error('typologies') text-danger @enderror">
                    Tipologie:
                  </label>

                  <ul id="services_list">
                    @foreach ($typologies as $typology)
                      <li>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input  @error('typologies') is-invalid @enderror" type="checkbox"
                            id="tech-{{ $typology->id }}" name="typologies[]" value="{{ $typology->id }}"
                            @if (in_array($typology->id, old('typologies', $restaurant_typologies ?? []))) checked @endif>

                          <label class="form-check-label @error('typologies') text-danger @enderror"
                            for="tech-{{ $typology->id }}">
                            <i class="{{ $typology->icon }}"></i>
                            <span>{{ $typology->name }}</span>
                          </label>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                  @error('typologies')
                    <p class="text-danger fw-bold">{{ $message }}</p>
                  @enderror
                </div>

              </div>
              <div class="modal-footer">
                <button id="checkedServices" type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                  Chiudi e conferma
                </button>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>

  {{-- ! CONTAINER STAMPA SERVIZI AGGIUNTIVI --}}
  <div id="servicesContainer" class="d-flex flex-column flex-wrap mt-3" style="max-height: 10rem"></div>

  <button type="submit" class="btn btn-primary">Salva</button>

  <a href="{{ route('restaurants.index') }}" class="btn btn-primary me-3">
    Torna alla lista
  </a>



  </form>
@endsection
@section('scripts')
  {{-- * Stampa icone tipologia aggiuntivi nel form create/edit --}}

  <script>
    let checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    let servicesContainer = document.getElementById('servicesContainer');

    // Funzione per aggiungere una tipologia al container
    function addServiceToContainer(typology) {
      let serviceEl = document.createElement('div');
      serviceEl.innerHTML = `
            <input type="hidden" name="typologies[]" value="${typology.id}">
            <span class="${typology.icon}" aria-hidden="true"></span>
            <i class="me-3 ">${typology.name}</i>
        `;
      servicesContainer.appendChild(serviceEl);
    }

    // Aggiungo i servizi selezionati al container al caricamento della pagina
    checkboxes.forEach(function(checkbox) {
      let typology = {
        id: checkbox.value,
        name: checkbox.nextElementSibling.querySelector('span').textContent,
        icon: checkbox.nextElementSibling.querySelector('i').classList.value
      };
      addServiceToContainer(typology);
    });

    // Event listener per aggiornare il container quando si selezionano/rimuovono servizi
    document.addEventListener('change', function(event) {
      if (event.target.matches('input[type="checkbox"]')) {
        servicesContainer.innerHTML = '';
        checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function(checkbox) {
          let typology = {
            id: checkbox.value,
            name: checkbox.nextElementSibling.querySelector('span').textContent,
            icon: checkbox.nextElementSibling.querySelector('i').classList.value
          };
          addServiceToContainer(typology);
        });
      }
    });
  </script>

  {{-- VISIBILITY --}}

  <script type="text/javascript">
    let allRadios = document.getElementsByName('visibility');
    let booRadio;
    let x = 0;
    for (x = 0; x < allRadios.length; x++) {

      allRadios[x].onclick = function() {
        if (booRadio == this) {
          this.checked = false;
          booRadio = null;
        } else {
          booRadio = this;
        }
      };
    }
  </script>
@endsection
