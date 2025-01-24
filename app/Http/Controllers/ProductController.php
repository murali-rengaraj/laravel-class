<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    // Index
    public function index()
    {
        $result = Products::all();
        // dd($result);
        // return view('products.index',["result"=>$result]);
        return view('products.index', compact('result'));
    }

    public function store(Request $request)
    {

        // $request->validate([
        //     'img' => 'required|file|mimes:jpeg,png,jpg,gif|size:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        // ]); //2mb limit
        // print_r($request->img);
        // echo "<br>";
        // echo $request->img->extension();
        // echo "<br>";
        // echo $request->img->getClientOriginalName();
        // echo "<br>";
        // echo $request->img->getSize(); //in bytes
        // echo "<br>";
        // echo $request->img->getMimeType();
        // echo "<br>";

        // dd($request);

        $imgname = time() . '.' . $request->img->extension();
        // echo $imgname;
        // exit;
        $request->img->move(public_path("productImages"), $imgname);

        $product = new Products();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->desc;
        $product->image_name = $imgname;
        $product->save();

        return redirect('/')->with("success", "Data Inserted Successfully!");;
    }

    public function edit($id)
    {
        $result = Products::find($id);

        // return view('/products/edit',compact('result'));
        return view('/products/edit', ['result' => $result]);
    }

    public function update(Request $request)
    {
        $result = Products::findOrFail($request->id);

        $prevImgName = $result->image_name;
        // $dir= asset('productImages/'.$prevImgName);
        $dir = public_path('productImages/' . $prevImgName);
        if (file_exists($dir)) {
            unlink($dir);
            // echo "Deleted Successfully <br>";
        }
        // echo $request->img->extension();
        // echo $request->img->getClientOriginalName();
        $newDir = time() . "." . $request->img->extension();
        $request->img->move(public_path("productImages"), $newDir);

        // $result->update($request->all());
        $result->name = $request->name;
        $result->price = $request->price;
        $result->description = $request->desc;
        $result->image_name = $newDir;
        $result->save();

        return redirect('/')->with("success", "Data Updated Successfully!");
    }

    public function destroy(Request $request)
    {
        // echo $request->id;
        // exit;
        $detete = Products::findOrFail($request->id);
        $detete->delete();

        return back()->with("success", "Data Deleted Successfully!");;
    }

    // public function imageResize(Request $request)
    // {

    //     $image = $request->file('img');

    //     $destinationPath = public_path('/productImages');
    //     $imageName = time() . '.' . $image->getClientOriginalExtension();

    //     // $imageName = time() . '.' . $request->img->extension();

    //     // Resize the image using Intervention Image
    //     $resizedImage = Image::make($image->getRealPath());
    //     $resizedImage->resize(300, 300, function ($constraint) {
    //         $constraint->aspectRatio(); // Maintain aspect ratio
    //         $constraint->upsize();     // Prevent upscaling
    //     });

    //     // Save the resized image
    //     $resizedImage->save($destinationPath . '/' . $imageName);

    //     // Optionally, return a response or redirect
    //     return back();
    // }
}
