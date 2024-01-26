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

                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Nome dell'appartamento <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('apartment_name') is-invalid @enderror"
                        value="{{ old('apartment_name') }}" id="inputapartment_name" name="apartment_name">
                    <div id="error-apartmentname" class="invalid_feedback"></div>
                    @error('apartment_name')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Immagine Appartamento <span
                            class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('img') is-invalid @enderror"
                        value="{{ old('img') }}" id="inputimg" name="img" accept="image/*">
                    <div id="error-img" class="invalid_feedback"></div>
                    @error('img')
                        <div class="invalid_feedback"></div>
                    @enderror
                </div>




                
                <div class="col-12">
                    <label for="inputTitle" class="form-label text-light">Indirizzo <span
                            class="text-danger">*</span></label>
                    {{-- value="{{ old('email'= ottenere il valore precedentemente inviato --}}
                    {{-- , $name?->email) }} = stampare il valore di email --}}
                    {{-- , $name?->email) }} = "?" se la variabile $name non è definito assegna "null"  --}}
                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address') }}" id="inputaddress" name="address"
                        placeholder="Esempio: Via Brombeis n°23">
                    <div id="error-address" class="invalid_feedback"></div>
                    @error('address')
                        <div class="invalid_feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputTitle" class="form-label text-light">Tipologia <span class="text-danger">*</span></label>
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