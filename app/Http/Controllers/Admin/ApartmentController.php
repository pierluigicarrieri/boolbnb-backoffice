<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ApartmentCreateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $apartments = Apartment::where("user_id", $userId)->orderBy('name')->get();
        return view("admin.apartments.index", compact("apartments"));
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

        // dd($data);

        //Il campo del form photo viene messo nello storage 
        $data["photo"] = Storage::put("", $data["photo"]);

        //Prende lo user che ha fatto la request
        $user = $request->user();

        $apartment = new Apartment($data);

        //collega il ristorante appena creato all'utente autenticato.
        $user->apartments()->save($apartment);

        //se nel form è presente il valore data services  
        if (key_exists("services", $data)) {
            //associamento tra apartment e il serviceß
            $apartment->services()->sync($data["services"]);
        }
        return redirect()->route("admin.apartments.show", $apartment->id);
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     //Ottiene l'ID dell'appartamento associato all'utente autenticato.
    //     $apartments_id = Auth::user()->apartments->id;


    //     $apartment = Apartment::where("id", $id)->firstOrFail();

    //     //Verifica se l'ID del ristorante coincide con l'ID del ristorante dell'utente.
    //     if ($apartments_id !== $apartment->id) {
    //         abort(404);
    //     } else {
    //         return view("admin.apartments.show", compact("apartment"));
    //     }
    // }
    public function show($id)
    {

        $apartment = Apartment::where("id", $id)->firstOrFail();
        
        return view("admin.apartments.show", compact("apartment"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $apartment = Apartment::findOrFail($id);

        $services = Service::all();

        return view("admin.apartments.edit")->with(['apartment' => $apartment, 'services' => $services]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApartmentCreateRequest $request, $id)
    {
        $data = $request->validated();
        
        $apartment = Apartment::findOrFail($id);

        //se data[photo] ha un valore esegui
        if (key_exists("photo", $data)) {
            // se data[photo] ha un valore fai il put di photo
            $data["photo"] = Storage::put("", $data["photo"]);
        } else {
            //altrimenti metti l'img di prima
            $data["photo"] = $apartment->photo;
        }

        //se nel form è presente il valore data services  
        if (key_exists("services", $data)) {
            //associazione tra apartment e il service
            $apartment->services()->sync($data["services"]);
        }

        $apartment->update($data);

        return redirect()->route("admin.apartments.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {

        $apartment = Apartment::findOrFail($id);

        // Control to delete image from 'storage' folder
        if ($apartment->photo) {

            Storage::delete($apartment->photo);
        }

        //Deletes relations
        $apartment->services()->detach();

        $apartment->sponsorships()->detach();

        //Deletes '$apartment'
        $apartment->delete();

        //Redirects to 'index' route
        return redirect()->route('admin.apartments.index');

    }
}
