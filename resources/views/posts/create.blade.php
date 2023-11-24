<x-layouts.main title="Site | Create Post">
    <h1>Create Post</h1>
    <form method="post" action="{{ route('posts.store') }}" class="col-md-6">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        @error('title')<p class="text-danger"><small>{{ $message }}</small></p>@enderror
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" type="text" name="description" class="form-control"
            >{{ old('description') }}</textarea>
        </div>
        @error('description')<p class="text-danger"><small>{{ $message }}</small></p>@enderror
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" type="text" name="content" rows="7" class="form-control"
            >{{ old('content') }}</textarea>
        </div>
        @error('content')<p class="text-danger"><small>{{ $message }}</small></p>@enderror
        <button class="btn btn-success my-4">Create</button>
    </form>
</x-layouts.main>
