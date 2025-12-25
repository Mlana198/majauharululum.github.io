<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')->latest()->get();
        return view('news', compact('posts'));
    }

    public function admin()
    {
        $posts = Post::latest()->get();
        return view('admin.news', compact('posts'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'body'  => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['author_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] =
                $request->file('image')->store('posts', 'public');
        }

        Post::create($data);

        return redirect('/admin-news')->with('success', 'Berita berhasil ditambahkan');
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

}