<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function show()
    {
        // return response()->json(User::find($id));
        return response()->json(Auth::user());
    }

}
