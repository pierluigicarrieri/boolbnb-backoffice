<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\JsonResponse;

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
}
