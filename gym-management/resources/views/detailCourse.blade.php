<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All activities') }}
        </h2>
    </x-slot>

    <main class="container mt-5 shadow p-3 bg-white">
        <h2 class="h2">Book it now!</h2>
        <a href="/personal/course"><i class="bi bi-arrow-left"></i></a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- N.B. guarda file di testo "progettazione.txt" --}}
                <tr>
                    <th scope="row">1</th> 
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td class="text-center">{{ $course->capacity }}</td>
                    <td>
                        @if (!$reservation)
                            <form method="POST" action="{{ route('reservation.store') }}">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button type="submit" class="btn btn-primary">Book Now</button>
                            </form>
                        @elseif ($reservation)
                            @switch($reservation)
                            @case($reservation->status == 'pending' || $reservation->status == 'Pending')
                                <p>You have already booked this course. <span class="text-secondary">In pending...</span></p>
                                @break
                            @case($reservation->status == 'rejected' || $reservation->status == 'Rejected')
                                <p>Your reservation is <span class="text-danger">rejected...</span></p>
                                <form method="POST" action="{{ route('reservation.update', ['reservation' => $reservation->id]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="book_again" value="{{ $reservation->id }}">
                                    <button type="submit" class="btn btn-primary">Book Now Again</button>
                                </form>
                                @break
                            @case($reservation->status == 'accepted' || $reservation->status == 'Accepted')
                                <p>Your reservation is <span class="text-primary">accepted!</span></p>
                                @break
                            @endswitch
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</x-app-layout>
