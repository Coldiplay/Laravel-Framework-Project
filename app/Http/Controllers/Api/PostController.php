<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Display a listing of posts.
     */
    public function fetchAll(): PostCollection
    {
        $posts = Post::with('user')->latest()->paginate(15);
        return new PostCollection($posts);
    }

    /**
     * Display the specified post.
     */
    public function fetch(Post $post): JsonResponse
    {
        $post->load('user');
        return response()->json([
            'post' => new PostResource($post),
        ]);
    }

    /**
     * Update the specified post.
     */
    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
        $this->authorize('update', $post);

        $post->update($request->validated());

        return response()->json([
            'message' => 'Post updated successfully',
            'post' => new PostResource($post),
        ]);
    }

    /**
     * Store a newly created post.
     */
    public function create(StorePostRequest $request): JsonResponse
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id,
        ]);

        $post->load('user');

        return response()->json([
            'message' => 'Post created successfully',
            'post' => new PostResource($post),
        ], 201);
    }

    /**
     * Remove the specified post.
     */
    public function kill(Post $post): JsonResponse
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->json([
            'message' => 'Post deleted successfully',
        ]);
    }
}
