<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Models\User;

class PostRepository
{
    public function getPostById(int $id, array $relations=[]): Post
    {
        return Post::with($relations)->findOrFail($id);
    }


    public function storePost($user, array $request)
    {
        $posts = collect();
        if (! is_null($request)) {
            foreach ($request as $postRequest) {
                $post = new Post();
                if (!is_null(@$postRequest['id'])) {
                    $post = Post::findOrFail($postRequest['id']);
                }
                $post->fill($postRequest);
                $post->user()->associate($user);
                $post->save();
                $posts->push($post);
            }
        }
    }


    public function updatePost(Post $post)
    {
    }


    public function deletePost(Post $post): bool
    {
        return $post->delete();
    }
}
