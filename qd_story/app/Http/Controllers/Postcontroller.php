<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Gate;
 
class PostController extends Controller
{
  /* Make sure you don't user Gate and Policy altogether for the same Model/Resource */
  public function gate()
  {
    $post = Post::find(1);
 
    if (Gate::allows('update-post', $post)) {
      echo 'Allowed';
    } else {
      echo 'Not Allowed';
    }
     
    exit;
  }
  public function create()
  {
// User đang đăng nhập
    $user = Auth::user();

    if ($user->can('create', Post::class)) {
      echo 'Có quyền tạo bài viết.';
    } else {
      echo 'Không có quyền';
    }

    exit;
  }
}
