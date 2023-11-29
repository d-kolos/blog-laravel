<?php
/** @var stdClass $post */
?>
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Errors</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="form-group">
    <label for="title">Title</label>
    <input id="title" type="text" name="title" class="form-control"
           value="{{ old('title', $post->title ?? null) }}">
</div>
@error('title')<p class="text-danger"><small>{{ $message }}</small></p>@enderror
<div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" type="text" name="description" class="form-control"
    >{{ old('description', $post->description ?? null) }}</textarea>
</div>
@error('description')<p class="text-danger"><small>{{ $message }}</small></p>@enderror
<div class="form-group">
    <label for="content">Content</label>
    <textarea id="content" type="text" name="content" rows="7" class="form-control"
    >{{ old('content', $post->content ?? null) }}</textarea>
</div>
@error('content')<p class="text-danger"><small>{{ $message }}</small></p>@enderror
