<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function index(){
        $user = Register::all();
        // $user = Register::paginate(3);

        return view("users",compact('user'));
    }
}
