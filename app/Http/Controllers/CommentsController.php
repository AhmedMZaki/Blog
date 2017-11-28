<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use DB;

class CommentsController extends Controller
{
    public function store(Post $post){
      $this->validate(request(),['body'=>'required|min:2']);
      // the clean way
      $post->addComment(request('body'));

      // the long way
      // Comment::create([
      //   'body'=>request('body'),
      //   'post_id'=>$post->id
      // ]);

      return back();
    }
}
