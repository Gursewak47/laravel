<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\Post\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function index()
    {
        return Post::query()->get();
    }


    public function show(int $id)
    {
        return $this->postRepository->getPostById($id);
    }


    public function store()
    {
    }


    public function update()
    {
    }


    public function destory(int $id)
    {
        $this->postRepository->deletePost($this->postRepository->getPostById($id));
    }
}
