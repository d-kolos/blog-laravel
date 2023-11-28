<?php
/** @var stdClass $post */
 ?>
<x-layouts.main title="Site | {{ $post->title }}">
    <p><strong>Author: {{ $post->user->name }}</strong></p>
    <p>Category {{ $post->category->title }}</p>
    <h1><small>#{{ $post->id }}:</small> {{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <p><b>{{ $post->content }}</b></p>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-warning" href="{{ route('posts.edit', compact('post')) }}">Edit</a>
        </div>
        <form action="{{ route('posts.destroy', compact('post')) }}" method="post" class="col-md-6">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</x-layouts.main>
