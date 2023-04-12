<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersControllers extends Controller
{
    public function show()
    {
        return view('list.users');
    }


}
