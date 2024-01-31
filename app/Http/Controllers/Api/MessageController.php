<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'text' => 'required',
        ]);
        Log::info('Validated Data:', $validatedData);
        $validatedData['text'] = $validatedData['text'];


        // Salva il messaggio nel database
        $message = Message::create($validatedData);
        
        return response()->json(['text' => 'Messaggio inviato con successo!', 'data' => $message], 201);
        
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}
