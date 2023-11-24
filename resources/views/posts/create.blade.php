<x-layouts.main title="Site | Create Post">
    <h1>Create Post</h1>
    <form method="post" action="{{ route('posts.store') }}" class="col-md-6">
        @csrf
        <x-posts.fields />
        <button class="btn btn-success my-4">Create</button>
    </form>
</x-layouts.main>
