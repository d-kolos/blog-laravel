<?php
/** @var $posts */
?>
<x-layouts.main title="Site | Blog">
    <h1>Blog</h1>
    <ul>
        @foreach($posts as $post)
            <li><strong>
                    <a href="{{ route('posts.show', compact('post')) }}"
                    ><small>#{{ $post->id }}:</small> {{$post->title }}</a>
                </strong>
                <small>
                    ({{ $post->category->title }})
                    <strong>{{ $post->user->name }}</strong>
                </small>
            </li>
        @endforeach
    </ul>
</x-layouts.main>
