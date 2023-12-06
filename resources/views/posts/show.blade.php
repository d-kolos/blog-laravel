<?php
/** @var stdClass $post */
 ?>
<x-layouts.main title="Site | {{ $post->title }}">
    <div><button class="btn btn-sm {{ $post->status->class() }}">Status: <strong
            >{{ $post->status->name() }}</strong></button></div>
    <p><strong>Author: {{ $post->user->name }}</strong></p>
    <div>
        <small>Category: </small>
        <button class="btn btn-outline-primary" disabled style="padding: 1px 5px; font-size: 0.7rem;"
              title="id={{ $post->category->id }}">{{ $post->category->title }}</button>
    </div>
    <div>
        <small>Tags: </small>
        @foreach($post->tags as $tag)
            <button class="btn btn-outline-dark" disabled style="padding: 1px 5px; font-size: 0.7rem;"
            title="id = {{ $tag->id }}">#{{ $tag->title }}</button>
        @endforeach
    </div>
    <h1><small>#{{ $post->id }}:</small> {{ $post->title }}</h1>
    <img src="{{ asset($post->image) }}" alt="">
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
