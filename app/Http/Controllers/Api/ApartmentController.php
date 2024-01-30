<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Visit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index(): JsonResponse
    {
        $apartments = Apartment::all();
        return response()->json($apartments);
    }

    public function show($id): JsonResponse
    {
        $apartment = Apartment::find($id);

        if (!$apartment) {
            return response()->json(['error' => 'Appartamento non trovato'], 404);
        }

        return response()->json($apartment);
    }
    public function saveApartmentData(Request $request)
  {
    // Validazione dei dati se necessario
    $validatedData = $request->validate([
      // ... definisci le regole di validazione qui, se necessario ...
    ]);

    // Ottieni i dati inviati dal frontend
    $apartmentData = $request->input('data');

    // Salva i dati nel database o fai altre operazioni necessarie
    // Ad esempio, puoi creare una nuova visita nel tuo caso
    // Puoi personalizzare questa parte in base alle tue esigenze
    $newVisit = Visit::create([
      'apartment_id' => $apartmentData['id'], // Assumi che l'ID sia presente nei dati dell'appartamento
      'ip' => $request->ip(),
      'date' => now(),
    ]);

    return response()->json(['message' => 'Data saved successfully']);
  }
}
