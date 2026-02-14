<x-main-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <p class="text-center display-3">FileSystem Lab</p>
            </div>
            <hr>
            <div class="d-flex gap-5">
                <a href="{{ route('storage.local.create') }}" class="btn btn-primary">Create File on Local Storage</a>
                <a href="{{ route('storage.local.append') }}" class="btn btn-primary">Add Content to File on Local Storage</a>
            </div>
        </div>
    </div>
</x-main-layout>