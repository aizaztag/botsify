<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Events\PostPublished;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PostController extends Controller
{
    /**
     * Saves a new post to the database
     */
    public function store(Request $request) {
        // ...
        // validation can be done here before saving
        // with $this->validate($request, $rules)
        // ...

        // get data to save in an associative array using $request->only()
       // $data = $request->only(['title', 'description']);
        //$data['user)i']
        //  save post and assign return value of created post to $post array
        //$post =     \App\Post::create(['title' => 'aizaz aziz'  ,'description' => 'aizaz' , 'user_id' => auth()->id()]);
        $post =     Post::find('36');

        //Post::create($data);

        // fire PostPublished event after post is successfully added to database
        event(new PostPublished($post));
        // or
        // \Event::fire(new PostPublished($post))

        // return post as response, Laravel automatically serializes this to JSON
        return response($post, 201);
    }
}
