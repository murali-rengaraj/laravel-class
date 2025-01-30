<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


use Intervention\Image\Facades\Image as Image;

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
        $request->validate([
            'name' => 'required|string|unique:products,name|regex:/^[A-z ]*$/|min:3|max:12',
            'price' => 'required|numeric|digits_between:1,10',
            'desc' => 'required|string|min:5',
            'img' => 'required|file|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
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
        return view('products.edit', ['result' => $result]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[A-z ]*$/|min:3|max:12',
            'price' => 'required|numeric|digits_between:1,10',
            'desc' => 'required|string|min:5',
            'img' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $result = Products::findOrFail($request->id);
        $Dir = $result->image_name;
        if (!empty($request->img)) {
            // echo "image";
            // exit;
            $prevImgName = $result->image_name;
            $dir = public_path('productImages/' . $prevImgName);
            if (file_exists($dir)) {
                unlink($dir);
                // echo "Deleted Successfully <br>";
            }
            // echo $request->img->extension();
            // echo $request->img->getClientOriginalName();
            $Dir = time() . "." . $request->img->extension();
            $request->img->move(public_path("productImages"), $Dir);
        }

        // $result->update($request->all());
        $result->name = $request->name;
        $result->price = $request->price;
        $result->description = $request->desc;
        $result->image_name = $Dir;
        $result->save();

        return redirect('/')->with("success", "Data Updated Successfully!");
    }

    public function destroy(Request $request)
    {
        // echo $request->id;
        // exit;
        $detete = Products::findOrFail($request->id);
        $dir= public_path('productImages/' . $detete->image_name );
        if(file_exists($dir)){
            unlink($dir);
        }

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
