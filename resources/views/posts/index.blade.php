<?php
/** @var $posts */
?>
<x-layouts.main title="Site | Blog">
    <h1>Blog</h1>
    <ul>
        @foreach($posts as $post)
            <li><strong>
                    <a href="{{ route('posts.show', compact('post')) }}">
                        <small title="Id">#{{ $post->id }}:</small>
                        <span title="Title">{{$post->title }}</span>
                    </a>
                </strong>
                <small>
                    <span title="Category">{{ $post->category->title }}</span>
                    <strong title="Author">{{ $post->user->name }}</strong>
                    <a href="{{ route('posts.edit', compact('post')) }}"
                       class="btn btn-sm {{ $post->status->class() }}" title="Status. Click to Edit"
                       style="padding: 1px 5px; font-size: 0.7rem;">
                        {{ $post->status->name() }}
                    </a>
                </small>
            </li>
        @endforeach
    </ul>
</x-layouts.main>
