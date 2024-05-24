<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(){
        return view('modules.staffs.list');
    }

    public function add(){
        return view('modules.staffs.add');
    }
}
