<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    //
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect('login');
        }
        return "Hi!";
    }
}
