@extends('layouts.app')
@section('title', 'Projects')
@section('content')
    <div class="container p-3">
        <div style="background-color: rgba(0, 0, 0, 0.5)" class="card p-4 shadow rounded-lg ">
            <h1 class="text-center fw-bold text-uppercase my-4 text-light">I tuoi appartamenti</h1>
            <div class="row row-cols-4 g-3">
                @foreach ($apartments as $apartment)
                    <div class="col-12 col-md-4 ">
                        <div class="my-card card d-flex flex-column justify-content-between h-100">
                            <div>
                                <img src="{{ asset('storage/' . $apartment->photo) }}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body h-100">
                                <h5 class="card-title">{{ $apartment->name }}</h5>
                                <p class="card-text">{{ $apartment->address }}</p>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $apartment->mq }} Mq</p>
                                <p class="card-text">{{ $apartment->visible ? 'Visibile' : 'Non visibile' }}</p>
                            </div>
                            <div class="d-flex justify-content-between card-body">

                                <button type="button" class="btn btn-success">
                                    <a href="{{ route('admin.apartments.show', $apartment->id) }}">Dettagli</a>
                                </button>

                                <button type="button" class="btn btn-warning">
                                    <a href="{{ route('admin.apartments.edit', $apartment->id) }}">Modifica</a>
                                </button>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Elimina
                                </button>

                                <div class="modal fade text-black" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Elimina l'appartamento</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body  ">
                                                Sei sicuro di voler eliminare l'appartamento?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success  "
                                                    data-bs-dismiss="modal">Chiudi</button>
                                                <form action="{{ route('admin.apartments.destroy', $apartment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Conferma</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
