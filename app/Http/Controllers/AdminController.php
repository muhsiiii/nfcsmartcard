<?php

namespace App\Http\Controllers;

use App\Models\Campany;
use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function AdminHome()
    {
        $UsersCount=Users::count();
        $CampanyCount=Campany::count();
        return view('admin.adminhome',compact('UsersCount','CampanyCount'));
    }
}
