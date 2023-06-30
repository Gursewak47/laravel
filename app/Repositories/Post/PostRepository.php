<?php

namespace App\Repositories\Post;

use App\Models\Post\Post;

class PostRepository
{
    public function getPostById(int $id, array $relations=[]): Post
    {
        return Post::with($relations)->findOrFail($id);
    }


    public function storePost()
    {
    }


    public function updatePost(Post $post)
    {
    }


    public function deletePost(Post $post): bool
    {
        return $post->delete();
    }
}
