<x-layouts.main title="Site | Create Post">
    <h1>Create Post</h1>

    <form method="post" action="{{ route('posts.store') }}" class="row">
        @csrf
        <div class="col-md-6">
            <x-posts.fields/>
            <x-category-select/>
        </div>
        <div class="col-md-6 border border-dark" style="border-color: #ddd!important;">
            aaa
        </div>
        <button class="btn btn-success my-4">Create</button>
    </form>

</x-layouts.main>
