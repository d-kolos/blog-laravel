<?php

namespace App\Http\Controllers;

//use App\Enums\PostStatusEnum;
use App\Http\Requests\Posts\StoreRequest;
//use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
//use Psr\Container\ContainerExceptionInterface;
//use Psr\Container\NotFoundExceptionInterface;

class PostController extends Controller
{
    public function index(): View|Application|Factory|ContractsApplication
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $posts = Post::query()
//                     ->where('status', PostStatusEnum::PUBLISHED->value)
                     ->published()
                     ->with(['category', 'user'])
                     ->get();

        return view('posts.index', compact('posts'));
    }

    public function create(): View|Application|Factory|ContractsApplication
    {
        return view('posts.create');
    }

    public function store(StoreRequest $request): Application|Redirector|RedirectResponse|ContractsApplication
    {
        $post = Post::create($request->validated());

        return to_route('posts.show', compact('post'));
    }

    public function show(Post $post): View|Application|Factory|ContractsApplication
    {
        $post->load(['category', 'user']);

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post): View|Application|Factory|ContractsApplication
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, StoreRequest $request): Application|Redirector|RedirectResponse|ContractsApplication
    {
        $post->update($request->validated());

        return to_route('posts.show', compact('post'));
    }

    public function destroy(Post $post): Application|Redirector|RedirectResponse|ContractsApplication
    {
        $post->delete();

        return to_route('posts.index');
    }
}
