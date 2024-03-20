<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All courses') }}
        </h2>
    </x-slot>

    <main class="container mt-5 shadow p-3 bg-white">
        <h2 class="h2">Join us to one of our incredible course!</h2>
        @if($user_role === 'admin')
            <a href="/personal/course/create" class="btn btn-success mt-3">Add new course</a>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Reservation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->description }}</td>
                        <td class="text-center">{{ $course->capacity }}</td>
                        <td class="text-center text-primary-emphasis"><a href="course/{{ $course->id }}"><i class="bi bi-card-checklist"></i></a></td>
                        @if($user_role === 'admin')
                            <td>
                                <form action="{{ route('course.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Do you want to delete this course?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-white"><i class="text-danger bi bi-trash"></i></button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</x-app-layout>
