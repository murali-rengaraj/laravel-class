<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('post');
// });
Route::get('/', [ProductController::class, 'index']);


// All CRUD Operations
Route::prefix('products')->group(function () {
    Route::get('/create', function () {
        return view('products.create');
    });
    Route::post('/store', [ProductController::class, 'store']);
    Route::get('/edit/{id}', [ProductController::class, 'edit']);
    Route::put('/edit', [ProductController::class, 'update']);
    Route::delete('/destroy', [ProductController::class, 'destroy']);
});
Route::redirect('/products','/');

// Route::get('/products/create',function(){
//     return view('products.create');
// });
// Route::post('/products/store',[ProductController::class,'store']); 
// Route::get('/products/edit/{id}',[ProductController::class,'edit']);
// Route::put('/products/edit',[ProductController::class,'update']);
// Route::delete('/products/destroy',[ProductController::class,'destroy']);

Route::get('/tasks/imageResize', function () {
    return view('tasks/resize');
});
Route::post('/tasks/imageResize', [ProductController::class, 'imageResize']);




// Route::get('/',[PostController::class,"show"]);
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/show', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::put('/posts/{id}/update', [PostController::class, 'update']);

Route::delete('/posts/{id}', [PostController::class, 'destroy']);

Route::get('/users', [RegisterController::class, 'index']);

Route::get("/hello/{name?}", function ($n = "Ravi") {
    return view('hello', ["d1" => $n]);
});
Route::get('/layout', function () {
    return view("layouts");
});
Route::get('/check-controller', [DemoController::class, 'index']);
// Route::get('/check-controller',' DemoController@index');
// Route::get("/hi",function(){
//     return "hello";
// });

// Route::get("/hi/{id}",function($id){
//     echo "hi $id";
//     for($i=1; $i<$id+1; $i++){
//         echo $i. "<br>";
//     }
// });

// Route::get("/hi/{uid?}",function($id=5){
//     for($i=1; $i<$id+1; $i++){
//         echo $i. "<br>";
//     }
// });

Route::get("/hi/{uid?}", function ($id = 3) {
    echo "hi<br>";
    for ($i = 1; $i < $id + 1; $i++) {
        echo $i . "<br>";
    }
})->where("uid", "[0-9]+")->name("table");

Route::fallback(function () {
    // return response()->view('404', [], 404);
    // return redirect()->route('table');
    return "404";
});