@extends('layouts.app')
@section('title', 'Create')
@section('content')

    <div class="container p-3">
        <div style="background-color: rgba(0, 0, 0, 0.5)" class="card p-4 shadow rounded-lg ">
            <h1 class="my-4 text-center text-light">Inserisci i dati per registrare il tuo Appartamento!</h1>
            <form action="{{ route('admin.apartments.store') }}" class="row g-3" method="POST" 
            enctype="multipart/form-data" 
            {{-- when submit is pressed call to javascript function for data validation, script at the bottom of the page --}}
            {{-- onsubmit="return(validate())"  --}}
            >
                @csrf()
                @method('POST')

                {{-- Apartment name insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Nome dell'appartamento<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('apartment_name') is-invalid @enderror"
                        value="{{ old('apartment_name') }}" id="inputapartment_name" name="apartment_name">
                    <div id="error-apartmentname" class="invalid_feedback"></div>
                    @error('apartment_name')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment rooms insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Stanze<span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('apartment_rooms') is-invalid @enderror"
                        value="{{ old('apartment_rooms') }}" id="inputapartment_rooms" name="apartment_rooms">
                    <div id="error-apartmentrooms" class="invalid_feedback"></div>
                    @error('apartment_rooms')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment beds insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Letti<span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('apartment_beds') is-invalid @enderror"
                        value="{{ old('apartment_beds') }}" id="inputapartment_beds" name="apartment_beds">
                    <div id="error-apartmentbeds" class="invalid_feedback"></div>
                    @error('apartment_beds')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment bathrooms insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Bagni<span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('apartment_bathrooms') is-invalid @enderror"
                        value="{{ old('apartment_bathrooms') }}" id="inputapartment_bathrooms" name="apartment_bathrooms">
                    <div id="error-apartmentbathrooms" class="invalid_feedback"></div>
                    @error('apartment_bathrooms')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment size(mq) insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Superficie in mq<span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('apartment_mq') is-invalid @enderror"
                        value="{{ old('apartment_mq') }}" id="inputapartment_mq" name="apartment_mq">
                    <div id="error-apartmentmq" class="invalid_feedback"></div>
                    @error('apartment_mq')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment address insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Indirizzo<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('apartment_address') is-invalid @enderror"
                        value="{{ old('apartment_address') }}" id="inputapartment_address" name="apartment_address">
                    <div id="error-apartmentaddress" class="invalid_feedback"></div>
                    @error('apartment_address')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment latitude insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Latitudine<span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('latitude') is-invalid @enderror"
                        value="{{ old('latitude') }}" id="inputlatitude" name="latitude">
                    <div id="errorlatitude" class="invalid_feedback"></div>
                    @error('latitude')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment longitude insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Longitudine<span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('longitude') is-invalid @enderror"
                        value="{{ old('longitude') }}" id="inputlongitude" name="longitude">
                    <div id="errorlongitude" class="invalid_feedback"></div>
                    @error('longitude')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment photo insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Immagine Appartamento<span
                            class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                        value="{{ old('photo') }}" id="inputphoto" name="photo" accept="image/*">
                    <div id="error-photo" class="invalid_feedback"></div>
                    @error('photo')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment visibility toggle and error handling through js --}}
                <label class="form-check-label text-light" for="flexRadioDefault2">
                    Visibile <span class="text-danger">*</span>
                </label>
                <div class="form-check @error('visible') is-invalid @enderror">
                    <input class="form-check-input type-radios" type="radio" name="visible" id="flexRadioDefault1"
                        value="1">
                    <label class="form-check-label text-light " for="flexRadioDefault1">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input type-radios" type="radio" name="visible" id="flexRadioDefault2"
                        value="0">
                    <label class="form-check-label text-light" for="flexRadioDefault1">
                        No
                    </label>
                </div>
                <div id="error-visible" class="invalid_feedback"></div>
                @error('visible')
                    <div class="invalid_feedback"></div>
                @enderror

                {{-- Apartment services checkboxes and error handling through js --}}
                <label for="inputTitle" class="form-label text-light">Servizi inclusi<span class="text-danger">*</span></label>
                <div class="d-flex gap-3">
                    @foreach ($types as $type)
                        <div class="form-check form-switch  @error('types') is-invalid @enderror">
                            <input class="form-check-input type-checkbox" type="checkbox" name="types[]" role="switch"
                                id="{{ $type->id }}" value="{{ $type->id }}">
                            <label class="form-check-label text-light"
                                for="{{ $type->id }}">{{ $type->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div id="error-type" class="invalid_feedback"></div>
                @error('types')
                    <div class="invalid_feedback">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-center">

                    <button class="btn btn-primary" type="submit">Crea il tuo ristorante</button>
                </div>
            </form>
        </div>

    </div>

    <script src=""></script>
@endsection