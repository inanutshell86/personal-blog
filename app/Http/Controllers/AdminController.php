<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePost;
use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function comments()
    {
        return view('admin.comments');
    }

    public function posts()
    {
        $posts = Post::all();
        return view('admin.posts', compact('posts'));
    }

    public function users()
    {
        return view('admin.users');
    }

    public function editPost($id)
    {
        $post = Post::where('id', $id)->first();
        return view('admin.editPost', compact('post'));
    }

    public function postEditPost(CreatePost $request, $id)
    {
        $post = Post::where('id', $id)->first();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->save();

        return back()->with('success', "Post has been updated successfully.");
    }

    public function removePost($id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();

        return back();
    }
}
