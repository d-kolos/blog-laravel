<x-layouts.main title="Site | Create Post">
    <h1>Create Post</h1>
    <form method="post" action="{{ route('posts.store') }}" class="row" id="storePostForm">
        @csrf
        <div class="col-md-6">
            <x-posts.fields/>
            <x-category-select/>
        </div>
        <div class="col-md-6">
            <x-posts.tag-checkboxes />
        </div>
    </form>
    <button id="postButton" class="btn btn-success my-4" form="storePostForm" disabled>Create</button>
</x-layouts.main>
