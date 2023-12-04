<?php

use App\Enums\PostStatusEnum;

/** @var stdClass $post */
?>
<x-layouts.main title="Site | Edit Post">
    <h1>Edit Post</h1>
    <form method="post" action="{{ route('posts.update', compact('post')) }}"
          class="row" id="postUpdateForm">
        @csrf
        @method('put')
        <div class="col-md-6">
            <p>#{{ $post->id }}</p>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    @foreach(PostStatusEnum::cases() as $status)
                        <option value="{{ $status->value }}">{{ $status->name() }}</option>
                    @endforeach
                </select>
            </div>
            <x-posts.fields :post="$post"/>
            <x-category-select :categoryId="$post->category_id"/>
        </div>
        <div class="col-md-6">
            <x-posts.tag-checkboxes :currentTags="$post->tags" />
        </div>
    </form>
    <button class="btn btn-success my-4" form="postUpdateForm">Update</button>
</x-layouts.main>
