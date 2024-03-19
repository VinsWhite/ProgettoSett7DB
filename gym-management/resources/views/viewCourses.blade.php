<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All courses') }}
        </h2>
    </x-slot>

    <main class="container mt-5 shadow p-3 bg-light">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Capacity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->capacity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</x-app-layout>
