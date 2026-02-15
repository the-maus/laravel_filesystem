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
                <a href="{{ route('storage.local.read') }}" class="btn btn-primary">Read Content on Local Storage</a>
                <a href="{{ route('storage.local.read-multi') }}" class="btn btn-primary">Read Content with Multiple Lines</a>
            </div>
            <div class="d-flex gap-5 mt-5">
                <a href="{{ route('storage.local.check-file') }}" class="btn btn-primary">Check if File exists</a>
                <a href="{{ route('storage.local.store-json') }}" class="btn btn-primary">Save JSON</a>
                <a href="{{ route('storage.local.read-json') }}" class="btn btn-primary">Read JSON</a>
                <a href="{{ route('storage.local.list') }}" class="btn btn-primary">List Files</a>
            </div>
        </div>
    </div>
</x-main-layout>