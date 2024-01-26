@extends('layouts.app')
@section('title', 'Show')
@section('content')
    <div class="container p-3">
        <div style="background-color: rgba(0, 0, 0, 0.5)" class="card p-4 shadow rounded-lg ">
            <h1 class="text-center fw-bold text-uppercase pb-5 text-light">Il tuo appartamento CAROH</h1>
            <div class="d-flex justify-content-center">
                <div class="my-card card mb-3" style="max-width: 800px;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src=" {{ asset('storage/' . $apartment->photo) }} " class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $apartment->name }}</h5>
                                <span class="fw-bold">Stanze</span>
                                <div class="card-text">{{ $apartment->rooms }}</div>
                                <span class="fw-bold">Letti</span>
                                <div class="card-text">{{ $apartment->beds }}</div>
                                <span class="fw-bold">Bagni</span>
                                <div class="card-text">{{ $apartment->bathrooms }}</div>
                                <span class="fw-bold">Mq</span>
                                <div class="card-text">{{ $apartment->mq }}</div>
                                <span class="fw-bold">Indirizzo</span>
                                <div class="card-text">{{ $apartment->address }}</div>
                                <span class="fw-bold">Latitudine</span>
                                <div class="card-text">{{ $apartment->lat }}</div>
                                <span class="fw-bold">Longitudine</span>
                                <div class="card-text">{{ $apartment->lon }}</div>
                                <span class="fw-bold">Servizi offerti</span>
                                <ul class="p-0 d-flex justify-content-start">
                                    @foreach ($apartment->services as $service)
                                        <li class="p-2">{{ $service->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection