<?php
/** @var stdClass $post */
?>
<x-layouts.main title="Site | Edit Post">
    <h1>Edit Post</h1>
    <form method="post" action="{{ route('posts.update', ['id' => $post->id]) }}" class="col-md-6">
        @csrf
        @method('put')
        <p>#{{ $post->id }}</p>
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" type="text" name="title" value="{{ $post->title }}"
                   class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" type="text" name="description"
                      class="form-control">{{ $post->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" type="text" name="content" rows="7"
                      class="form-control">{{ $post->content }}</textarea>
        </div>
        <button class="btn btn-success my-4">Update</button>
    </form>
</x-layouts.main>
