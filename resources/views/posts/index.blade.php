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
                        <span title="Post Title. Click to view">{{$post->title }}</span>
                    </a>
                </strong>
                <small>&nbsp;<span title="Post Category. id={{ $post->category->id }}">
                    <button class="btn btn-outline-primary" disabled
                            style="padding: 1px 5px; font-size: 0.7rem;">
                        {{ $post->category->title }}</button></span>
                    <strong title="Post Author. id={{ $post->user->id }}">{{ $post->user->name }}</strong>
                </small>
                <small>
                    @foreach($post->tags as $tag)
                        <span title="tag id={{ $tag->id }}">
                            <button class="btn btn-outline-dark" disabled
                                    style="padding: 1px 5px; font-size: 0.7rem;">
                            #{{ $tag->title }}</button>
                            </span>
                    @endforeach
                </small>
                <a href="{{ route('posts.edit', compact('post')) }}"
                   class="btn btn-sm {{ $post->status->class() }}" title="Status. Click to Edit"
                   style="padding: 1px 5px; font-size: 0.7rem;">
                    {{ $post->status->name() }}
                </a>

            </li>
        @endforeach
    </ul>
</x-layouts.main>
