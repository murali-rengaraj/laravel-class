<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

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

    public function edit($id){
        $data = Post::findOrFail($id);
        // print_r($data);
        return view('posts/edit',compact('data'));
    }

    public function update(Request $request,$id){
        $data=Post::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('posts.show')->with("success","Data Upadated Successfully!");
    }

    public function destroy($id){
        $remove = Post::findOrFail($id);
        $remove->delete();
        return redirect('posts/show')->with("delete","Delete Data Successfully");
    }
}
