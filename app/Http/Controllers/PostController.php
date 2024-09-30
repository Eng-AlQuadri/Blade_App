<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {

        $postsFromDB = Post::all();

        $allPosts = [
            ['id' => 1, 'title' => 'PHP', 'posted_by' => 'Ahmad', 'created_at' => '2024-10-10 09:38:06'],
            ['id' => 2, 'title' => 'JS', 'posted_by' => 'Nader', 'created_at' => '2024-7-18 06:22:18'],
            ['id' => 3, 'title' => 'HTML', 'posted_by' => 'Mamdoh', 'created_at' => '2024-11-10 15:52:52']
        ];

        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function show($postId)
    {

        $singlePostFromDB = Post::find($postId);

        return view('posts.show', ['post' => $singlePostFromDB]);
    }

    public function create()
    {

        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {

        $data = request()->all();

        $title = request()->title;

        $description = request()->userText;

        $postCreator = request()->postCreator;

        // $post = new Post;

        // $post->title = $title;

        // $post->description = $description;

        Post::create([
            'title' => $title,
            'description' => $description,
            'userId' => $postCreator
        ]);

        // $post->save();

        return to_route('posts.index');
    }

    public function edit(Post $post)
    {

        $users = User::all();

        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    public function update($postId)
    {

        $title = request()->title;

        $description = request()->userText;

        $postCreator = request()->postCreator;

        $singlePostFromDB = Post::find($postId);

        $singlePostFromDB->update([

            'title' => $title,
            'description' => $description,
            'userId' => $postCreator
        ]);

        return to_route('posts.show', $postId);
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return to_route('posts.index');
    }
}
