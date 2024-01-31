@extends('layouts.app')
@section('title', 'Messaggi')
@section('content')
    <div class="container mt-5">
        <h1 class="display-4">Messaggi</h1>

        @forelse ($messages as $message)
            <div class="message-container mb-4">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td class="fw-bold fs-4">{{ $message->first_name }} {{ $message->last_name }}</td>
                            <td class="fs-4">{{ $message->email }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="fs-5">{{ $message->text }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-end">
                                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm float-end" onclick="return confirm('Sei sicuro di voler eliminare questo messaggio?')">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @empty
            <p class="fs-5">Nessun messaggio disponibile.</p>
        @endforelse
    </div>
@endsection
