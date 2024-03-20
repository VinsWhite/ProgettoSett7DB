<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All courses') }}
        </h2>
    </x-slot>

    <main class="container mt-5 shadow p-3 bg-white">
        <h2 class="h2">Accept, cancel or reject reservation!</h2>
        
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</x-app-layout>
