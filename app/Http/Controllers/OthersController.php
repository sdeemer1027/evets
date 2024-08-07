<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OthersController extends Controller
{
    public function index(){

        // Fetch the user by ID
        $users = User::get();

        // Pass the user data to the view
        return view('others.index', compact('users'));
    }
}
