<?php
/** @var stdClass $post */
 ?>
<x-layouts.main title="Site | {{ $post->title }}">
    <h1><small>#{{ $post->id }}:</small> {{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <p><b>{{ $post->content }}</b></p>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-warning" href="/posts/{{ $post->id }}/edit">Edit</a>
        </div>
        <form action="/posts/{{ $post->id }}" method="post" class="col-md-6">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</x-layouts.main>
