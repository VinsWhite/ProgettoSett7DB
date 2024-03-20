<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All activities') }}
        </h2>
    </x-slot>

    <main class="container mt-5 shadow p-3 bg-white">
        <h2 class="h2">Join us to one of our incredible activity!</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Course</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->description }}</td>
                        <td>{{ $activity->course_name }}</td>
                        <td class="text-center text-primary-emphasis"><a href="activity/{{$activity->id}}"><i class="bi bi-journals"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</x-app-layout>
