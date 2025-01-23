<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function show(){
        $data= Post::all();
        // var_dump(compact('data'));
        // exit;

        return view('posts.show',compact('data'));
    }

    public function store(Request $request){
        // Post::create($request);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($validated);
        // Post::create($request->all());

        return redirect()->route('posts.create')->with("success","Data Inserted Successfully!");
    }
}
