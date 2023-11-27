<?php
/** @var stdClass $post */
?>
<x-layouts.main title="Site | Edit Post">
    <h1>Edit Post</h1>
    <form method="post" action="{{ route('posts.update', compact('post')) }}" class="col-md-6">
        @csrf
        @method('put')
        <p>#{{ $post->id }}</p>
        <x-posts.fields :post="$post" />
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $category)
                    <option @selected($category->id === $post->category_id)
                        value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @error('category_id')<p class="text-danger"><small>{{ $message }}</small></p>@enderror
        </div>
        <button class="btn btn-success my-4">Update</button>
    </form>
</x-layouts.main>
