<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ApartmentCreateRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Apartment;
use App\Models\Service;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApartmentCreateRequest $request)
    {
        //Validazione
        $data = $request->validated();

        //Il campo del form Img viene messo nello storage 
        $data["img"] = Storage::put("", $data["photo"]);

        //Prende lo user che ha fatto la request
        $user = $request->user();

        $apartment = new Apartment($data);

        //collega il ristorante appena creato all'utente autenticato.
        $user->apartments()->save($apartment);

        //se nel form è presente il valore data services  
        if (key_exists("services", $data)) {
            //associamento tra apartment e il service
            $apartment->services()->attach($data["services"]);
        }
        return redirect()->route("admin.apartments.show", $apartment->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
