<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Library\ApiHelpers;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use ApiHelpers;
    /**
     * Display a listing of posts.
     */
    public function fetchAll(): PostCollection
    {
        //$this->authorize('post-viewAny', Post::class);
        $posts = Post::with('user')->latest()->paginate(15);
        return new PostCollection($posts);
    }

    /**
     * Display the specified post.
     */
    public function fetch(Post $post): JsonResponse
    {
        if (Auth::user()->tokenCan('post:read')) {
            $post->load(['user', 'category']);
            return $this->onSuccess(new PostResource($post), 'Post fetched.');
        }

        return $this->onError(401, 'Unauthorized.');


//        return response()->json([
//            'post' => new PostResource($post),
//        ]);
    }

    /**
     * Update the specified post.
     */
    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
        $this->authorize('post-update', $post);

        $post->update($request->validated());

        return response()->json([
            'message' => 'Post updated successfully',
            'post' => new PostResource($post),
        ]);
    }

    /**
     * Store a newly created post.
     */
    public function create(CreatePostRequest $request): JsonResponse
    {
        $data = $request->validated();

        $slug = Str::slug($data['title']);
        if (Post::where('slug', $slug)->exists()) {
            return response()->json([
                'message' => 'Post with the same name already exists',
            ], 200);
        }
        //return response()->json(Str::slug($data['title']));
        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => Str::slug($data['title']),
            'user_id' => $request->user()->id,
            'category_id' => $data['category_id'],
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
