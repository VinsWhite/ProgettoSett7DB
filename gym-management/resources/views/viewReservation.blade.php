{{-- Questa pagina sarà accessibile solo dall'amministratore --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All courses') }}
        </h2>
    </x-slot>

    <main class="container mt-5 shadow p-3 bg-white">
        <h2 class="h2">Accept or reject reservation!</h2>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            {{-- N.B. guarda file di testo "progettazione.txt" --}}
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $reservation->course->name }}</td>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->status }}</td>
                        <td>@if( $reservation->status == 'accepted' || $reservation->status == 'Accepted' )
                                <button disabled type="submit" name="accept" class="btn btn-primary">Accept</button>
                            @else
                            <form method="POST" action="{{ route('reservation.update', ['reservation' => $reservation->id]) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                <button type="submit" name="accept" class="btn btn-primary">Accept</button>
                            </form>
                            @endif

                        </td>
                        <td>@if( $reservation->status == 'rejected' || $reservation->status == 'Rejected' )
                            <button disabled type="submit" name="reject" class="btn btn-danger">Reject</button>
                            @else
                            <form method="POST" action="{{ route('reservation.update', ['reservation' => $reservation->id]) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</x-app-layout>
