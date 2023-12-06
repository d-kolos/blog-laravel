<?php

namespace App\Http\Controllers;

//use App\Enums\PostStatusEnum;
use App\Http\Requests\Posts\StoreRequest;
//use App\Models\Category;
use App\Http\Requests\Tag\TagIdArrayRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
                     ->with(['category', 'user', 'tags'])
                     ->get();

        return view('posts.index', compact('posts'));
    }

    public function create(): View|Application|Factory|ContractsApplication
    {
        return view('posts.create');
    }

    public function store(
        StoreRequest $request,
        TagIdArrayRequest $tagIdArrayRequest
    ): Application|Redirector|RedirectResponse|ContractsApplication {
        $post = null;
        try {
            DB::beginTransaction();
            $post = Post::create($request->validated());
            $post->tags()->attach($tagIdArrayRequest->tags);
            DB::commit();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();

            return back();
        }

        return to_route('posts.show', compact('post'));
    }

    public function show(Post $post): View|Application|Factory|ContractsApplication
    {
        $post->load(['category', 'user', 'tags']);

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post): View|Application|Factory|ContractsApplication
    {
        $post->load(['category', 'tags']);

        return view('posts.edit', compact('post'));
    }

    public function update(
        Post $post,
        StoreRequest $request,
        TagIdArrayRequest $tagIdArrayRequest
    ): Application|Redirector|RedirectResponse|ContractsApplication
    {
        try {
            DB::beginTransaction();

            $post->update($request->validated());
            /*
                    $post->tags()->detach();
                    $post->tags()->attach($tagIdArrayRequest->tags);

                    One method:
            */
            $post->tags()->sync($tagIdArrayRequest->tags);
            DB::commit();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();

            return back();
        }

        return to_route('posts.show', compact('post'));
    }

    public function destroy(Post $post): Application|Redirector|RedirectResponse|ContractsApplication
    {
        $post->delete();

        return to_route('posts.index');
    }
}
