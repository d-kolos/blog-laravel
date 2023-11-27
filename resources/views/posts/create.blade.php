<x-layouts.main title="Site | Create Post">
    <h1>Create Post</h1>
    <form method="post" action="{{ route('posts.store') }}" class="col-md-6">
        @csrf
        <x-posts.fields />
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @error('category_id')<p class="text-danger"><small>{{ $message }}</small></p>@enderror
        </div>
        <button class="btn btn-success my-4">Create</button>
    </form>
</x-layouts.main>
