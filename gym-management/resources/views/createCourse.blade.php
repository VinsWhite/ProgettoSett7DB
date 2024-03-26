<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All courses') }}
        </h2>
    </x-slot>

    {{-- N.B. npm run dev per applicare lo stile dichiarato nel css" --}}

    <main class="container mt-5 shadow p-3 bg-white">
        <h2 class="h2">Create a new course!</h2>
        <a href="/personal/course"><i class="bi bi-arrow-left"></i></a>

        <form method="post" action="/personal/course">
            @csrf
            <div class="mb-3">
                <label for="exampleTitle" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" id="exampleTitle" aria-describedby="title">
            </div>
            <div class="mb-3">
                <label for="exampleDescription" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea style="resize: none;" class="form-control" name="description" id="exampleDescription" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleDeadline" class="form-label">Capacity <span class="text-danger">*</span></label>
                <input type="number" min=1 name="capacity" class="form-control" id="exampleDeadline" aria-describedby="deadline">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>

    </main>
</x-app-layout>
