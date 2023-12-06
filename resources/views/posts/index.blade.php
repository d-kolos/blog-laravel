<?php
/** @var $posts */
?>
<x-layouts.main title="Site | Blog">
    <h1>Blog</h1>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-3">
                <div class="card mb-2">
                    <a href="{{ route('posts.show', compact('post')) }}">
                        <img src="{{ asset($post->image) }}" class="card-img-top" alt="{{ $post->image }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('posts.show', compact('post')) }}">
                                <small title="Id"><small>#{{ $post->id }}:</small></small>
                                <span title="Post Title. Click to view">{{$post->title }}</span>
                            </a>
                        </h5>
                        <p class="card-text">
                            <span>Author:
                                <strong title="author id={{ $post->user->id }}">{{ $post->user->name }}</strong>
                            </span>
                            <br>
                            <span title="category id={{ $post->category->id }}">Category:
                                <button class="btn btn-outline-primary" disabled
                                        style="padding: 1px 5px; font-size: 0.7rem;">
                                    {{ $post->category->title }}
                                </button>
                            </span>
                            <br>
                            Status:
                            <a href="{{ route('posts.edit', compact('post')) }}"
                               class="btn btn-sm {{ $post->status->class() }}" title="Status. Click to Edit"
                               style="padding: 1px 5px; font-size: 0.7rem;">
                                {{ $post->status->name() }}
                            </a>
                            <br>
                            Tags:
                            @foreach($post->tags as $tag)
                                <span title="tag id={{ $tag->id }}">
                            <button class="btn btn-outline-dark" disabled
                                    style="padding: 1px 5px; font-size: 0.7rem;">
                            #{{ $tag->title }}</button>
                            </span>
                            @endforeach
                        </p>
                        <p class="card-text">{{ $post->description }}</p>
                        <a href="{{ route('posts.show', compact('post')) }}" class="btn btn-primary">Show post</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.main>
