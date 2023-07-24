<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    // public function task()
    // {
    //     return view('admin/task');
    // }
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){
        // $users = User::all();
        return view('admin/task');
    }
}
