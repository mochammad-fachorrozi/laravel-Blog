<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Data Post | Jicode';
        //get posts
        $posts = Post::latest()->paginate(10);

        //render view with posts
        return view('backend.posts.index', compact('title', 'posts'));
    }

    public function create()
    {
        $title = 'Tambah Post | Jicode';
        return view('backend.posts.create', compact('title'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/backend/storage/posts', $image->hashName());

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
            'user_id'   => 1,
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        $title = 'Detail Post | Jicode';
        // get post by id
        $post = Post::find($id);

        return view('backend.posts.view', compact('title', 'post'));
    }

    public function edit(Post $post)
    {
        $title = 'Edit Post | Jicode';
        return view('backend.posts.edit', compact('title', 'post'));
    }
    
    public function update(Request $request, Post $post)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/backend/storage/posts', $image->hashName());

            //delete old image
            Storage::delete('public/backend/storage/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
                'user_id'   => 1,
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Post $post)
    {
        //delete image
        Storage::delete('public/backend/storage/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function trash()
    {
        $title = 'Trash | Jicode';
        // $posts = Post::onlyTrashed()->paginate(10);
        // dd($posts);

        return view('backend.posts.trash', compact('title'));
    }
}