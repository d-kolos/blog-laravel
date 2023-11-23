<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class PostController extends Controller
{
    public function index(): View|Application|Factory|ContractsApplication
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create(): View|Application|Factory|ContractsApplication
    {
        return view('posts.create');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function store(): Application|Redirector|RedirectResponse|ContractsApplication
    {
        Post::insert([
            'title' => request()->title,
            'description' => request()->description,
            'content' => request()->get('content'),
        ]);

        return to_route('posts.index');
    }

    public function show(Post $post): View|Application|Factory|ContractsApplication
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post): View|Application|Factory|ContractsApplication
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update(Post $post): Application|Redirector|RedirectResponse|ContractsApplication
    {
        $post->update([
            'title' => request()->title,
            'description' => request()->description,
            'content' => request()->get('content'),
        ]);

        return to_route('posts.show', compact('post'));
    }

    public function destroy(Post $post): Application|Redirector|RedirectResponse|ContractsApplication
    {
        $post->delete();

        return to_route('posts.index');
    }
}
