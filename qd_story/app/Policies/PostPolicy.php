<?php
namespace App\Policies;
 
use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
 
class PostPolicy
{
  use HandlesAuthorization;
 
  public function view(User $user, Post $post)
  {
    return TRUE;
  }
 
  public function create(User $user)
  {
    return $user->id > 0;
  }
 
  public function update(User $user, Post $post)
  {
    return $user->id == $post->user_id;
  }
 
  public function delete(User $user, Post $post)
  {
    return $user->id == $post->user_id;
  }
}
