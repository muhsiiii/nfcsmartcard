<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function UserLogin(Request $request)
    {
        return response()->json([
            'username'=>$request->username,
            'password'=>$request->password
        ]);

    }
}
