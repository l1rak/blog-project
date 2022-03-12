<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function addComments(Post $post){

       $this->validate(request(), ['body'=>'required|min:2']);

       $post->addComment(request('body'));

        return back();
    }
}
