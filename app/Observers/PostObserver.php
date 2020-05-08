<?php
namespace App\Observers;

use App\Post;
use Illuminate\Support\Str;

class PostObserver
{
    public function creating(Post $post)
    {
        $post->title = Str::slug($post->title);
        $post->user_id = auth()->id();

    }
    public function retrieved(Post $post)
    {

        $post->title = ucfirst(str_replace('-', ' ',          $post->title));

    }
    public function deleting(Post $post)
    {
        // perhaps you have comments, replies, likes related to this post.
        // you might do this then, to avoid routine processes.
        $post->likes()->delete();
        $post->comments()->delete();
    }
}