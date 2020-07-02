<?php

namespace Dl\Panel\Controllers;

use Dl\Panel\Models\Post;
use Illuminate\Http\Request;
use Dl\Panel\Models\User;
class HomeController extends DlController
{
    /**
     * Create a new DlController instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $counter['posts']=Post::count();
        $counter['users']=User::count();
        return view('Panel::dashboard.pages.index',$counter);

    }
}
