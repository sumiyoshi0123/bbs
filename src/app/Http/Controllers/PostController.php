<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('index', compact('posts'));
    }

    public function store(PostRequest $request)
    {
        $post = $request->only(['name', 'title', 'content']);
        Post::create($post);

        return redirect('/')->with('message', '投稿が完了しました');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->get();

        return view('index', compact('posts','keyword'));
    }
}
