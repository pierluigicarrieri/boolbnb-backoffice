<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment; 
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
{
    // Ottieni l'ID dell'utente autenticato
    $userId = auth()->user()->id;

    // Ottieni tutti gli appartamenti associati all'utente
    $apartments = Apartment::where('user_id', $userId)->get();

    // Ottieni tutti i messaggi associati agli appartamenti dell'utente
    $messages = Message::whereIn('apartment_id', $apartments->pluck('id'))->get();

    return view('admin.message.index', compact('messages'));
}

public function destroy($id)
{
    // Trova il messaggio
    $message = Message::findOrFail($id);

    // Elimina il messaggio
    $message->delete();

    // Redirect alla pagina index o a qualsiasi altra pagina
    return redirect()->route('admin.messages.index');
}
}