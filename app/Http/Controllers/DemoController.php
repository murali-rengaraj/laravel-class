<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    public function index(Request $request){
        $p=$request->path();
        echo $p;
        echo "<br>";
        echo "Hi from controller, name: \"$p\"";
        echo "<br>";
    }
}
