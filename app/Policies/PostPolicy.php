<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return Response::allow();
//        return $user->role === 'admin'
//            ? Response::allow()
//            : Response::deny('You do not have permission to view any posts.');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): Response
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): Response
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function kill(User $user, Post $post): Response
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): Response
    {
        return $user->role === 'admin'
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): Response
    {
        return $user->role === 'admin'
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
