<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {

        $users = User::paginate('6');

        return view('admin.user.user', \compact('users'));
    }
}
