<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class GeodataController extends Controller
{
    public function getGeodata(Request $request)
    {
        $baseURL = 'https://api.tomtom.com/search/2';
        $versionNumber = '1';
        $apiKey = config('app.tomtom_api_key');
        $language = 'it-IT';
        $limit = 5;
        $query = $request->input('query');

        $response = Http::withoutVerifying()
        ->get("$baseURL/autocomplete/$versionNumber/$query.json", [
            'key' => $apiKey,
            'language' => $language,
            'limit' => $limit,
        ]);
        

        // Puoi gestire la risposta come preferisci, ad esempio restituirla come JSON
        return response()->json($response->json());
    }
    public function autocomplete(Request $request)
    {
        $baseURL = 'https://api.tomtom.com/search/2';
        $versionNumber = '1';
        $apiKey = config('app.tomtom_api_key');
        $language = 'it-IT';
        $limit = 5;
        $query = $request->input('query');
        
        $response = Http::withoutVerifying()
            ->get("$baseURL/autocomplete/$versionNumber/$query.json", [
                'key' => $apiKey,
                'language' => $language,
                'limit' => $limit,
            ]);
    
        $responseData = $response->json();
    
        if (isset($responseData['results']) && !empty($responseData['results'])) {
            // Risultati trovati, gestisci come desideri
            return response()->json($responseData['results']);
        } else {
            // Nessun risultato trovato
            return response()->json(['message' => 'Nessun risultato trovato'], 404);
        }
    }
}
