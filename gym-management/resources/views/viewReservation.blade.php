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
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $reservation->course->name }}</td>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->status }}</td>
                        <td><form method="POST" action="{{ route('reservation.update', ['reservation' => $reservation->id]) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="accept" value="{{ $reservation->id }}">
                                <button type="submit" class="btn btn-primary">Accept</button>
                            </form></td>
                        <td><form method="POST" action="{{ route('reservation.update', ['reservation' => $reservation->id]) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="reject" value="{{ $reservation->id }}">
                                <button type="submit" class="btn btn-danger">Reject</button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</x-app-layout>
