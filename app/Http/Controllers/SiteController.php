<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
use Illuminate\Contracts\View\Factory as Factory;
use Illuminate\Contracts\View\View as View;
use Illuminate\Foundation\Application as Application;
//use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(): View|Application|Factory|ApplicationAlias
    {
        return view('welcome');
    }
}
