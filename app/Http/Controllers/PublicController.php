<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);
        return view('welcome', compact('posts'));
    }

    public function singlePost(Post $post)
    {
        return view('singlePost', compact('post'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
