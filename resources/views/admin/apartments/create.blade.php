@extends('layouts.app')
@section('title', 'Create')
@section('content')

    <div class="container p-3">
        <div style="background-color: rgba(0, 0, 0, 0.5)" class="card p-4 shadow rounded-lg ">
            <h1 class="my-4 text-center text-light">Inserisci i dati per registrare il tuo Appartamento!</h1>
            <form action="{{ route('admin.apartments.store') }}" class="row g-3" method="POST" 
            enctype="multipart/form-data" 
            {{-- When submit is pressed call to javascript function for data validation, script at the bottom of the page --}}
            {{-- onsubmit="return(validate())"  --}}
            >
                @csrf()
                @method('POST')

                {{-- Apartment name insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Nome dell'appartamento<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" id="inputname" name="name">
                    <div id="errorname" class="invalid_feedback"></div>
                    @error('name')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment rooms insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Stanze<span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('rooms') is-invalid @enderror"
                        value="{{ old('rooms') }}" id="inputrooms" name="rooms">
                    <div id="errorrooms" class="invalid_feedback"></div>
                    @error('rooms')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment beds insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Letti<span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('beds') is-invalid @enderror"
                        value="{{ old('beds') }}" id="inputbeds" name="beds">
                    <div id="errorbeds" class="invalid_feedback"></div>
                    @error('beds')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment bathrooms insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Bagni<span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('bathrooms') is-invalid @enderror"
                        value="{{ old('bathrooms') }}" id="inputbathrooms" name="bathrooms">
                    <div id="errorbathrooms" class="invalid_feedback"></div>
                    @error('bathrooms')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment size(mq) insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Superficie in mq<span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('mq') is-invalid @enderror"
                        value="{{ old('mq') }}" id="inputmq" name="mq">
                    <div id="errormq" class="invalid_feedback"></div>
                    @error('mq')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment address insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Indirizzo<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address') }}" id="inputaddress" name="address">
                    <div id="erroraddress" class="invalid_feedback"></div>
                    @error('address')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment latitude insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Latitudine<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('lat') is-invalid @enderror"
                        value="{{ old('lat') }}" id="inputlat" name="lat">
                    <div id="errorlat" class="invalid_feedback"></div>
                    @error('lat')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>

                {{-- Apartment longitude insertion and error handling through js --}}
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Longitudine<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('lon') is-invalid @enderror"
                        value="{{ old('lon') }}" id="inputlon" name="lon">
                    <div id="errorlon" class="invalid_feedback"></div>
                    @error('lon')
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
                    @foreach ($services as $service)
                        <div class="form-check form-switch  @error('services') is-invalid @enderror">
                            <input class="form-check-input type-checkbox" type="checkbox" name="services[]" role="switch"
                                id="{{ $service->id }}" value="{{ $service->id }}">
                            <label class="form-check-label text-light"
                                for="{{ $service->id }}">{{ $service->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div id="error-service" class="invalid_feedback"></div>
                @error('services')
                    <div class="invalid_feedback"></div>
                @enderror

                {{-- Submit button to create apartment --}}
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit">Metti online il tuo appartamento</button>
                </div>
            </form>
        </div>

    </div>

    <script src=""></script>
@endsection