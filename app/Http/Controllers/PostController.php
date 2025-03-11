<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = 'All Posts';
        $data = Post::getAll();
        $dogImages = Post::getDogImages();
        return view('blogs', [
            'title' => $title,
            'data' => $data,
            'imageUrls' => $dogImages,
        ]);
    }

    public function getPostById(Post $post, string $id)
    {
        $dataPost = Post::getPostById($id);
        $userId = $dataPost['userId'];
        $dataUser = User::getUserById($userId);
        $dogImage = Post::getDogImage();
        $title = "Show Blog";

        return view('blog', [
            'title' => $title,
            'dataPost' => $dataPost,
            'dataUser' => $dataUser,
            'imageUrl' => $dogImage,
        ]);
    }
}
