<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
//use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class PostController extends Controller
{
    public function index(): View|Application|Factory|ContractsApplication
    {
        $posts = DB::table('posts')->get();

        return view('posts.index', ['posts' => $posts]);
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
        DB::table('posts')->insert([
            'title' => request()->title,
            'description' => request()->description,
            'content' => request()->get('content'),
        ]);

        return to_route('posts.index');
    }

    public function show($id): View|Application|Factory|ContractsApplication
    {
        $post = DB::table('posts')->where('id', '=', $id)->first();

        return view('posts.show', ['post' => $post]);
    }

    public function edit($id): View|Application|Factory|ContractsApplication
    {
        $post = DB::table('posts')->where('id', '=', $id)->first();

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update($id): Application|Redirector|RedirectResponse|ContractsApplication
    {
        DB::table('posts')->where('id', '=', $id)->update([
            'title' => request()->title,
            'description' => request()->description,
            'content' => request()->get('content'),
        ]);

        return to_route('posts.show', ['id' => $id]);
    }

    public function destroy($id): Application|Redirector|RedirectResponse|ContractsApplication
    {
        DB::table('posts')->where('id', '=', $id)->delete();

        return to_route('posts.index');
    }
}
