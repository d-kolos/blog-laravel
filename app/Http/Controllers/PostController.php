<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class PostController extends Controller
{
    public function index(): View|Application|Factory|ApplicationAlias
    {
        return view('posts.index');
    }
}
