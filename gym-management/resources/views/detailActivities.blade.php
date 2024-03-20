<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All activities') }}
        </h2>
    </x-slot>

    <main class="container mt-5 shadow p-3 bg-white">
        <h2 class="h2">Single activity details!</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th> 
                    <td>{{ $activity->name }}</td>
                    <td>{{ $activity->description }}</td>
                </tr>
            </tbody>
        </table>
    </main>
</x-app-layout>
