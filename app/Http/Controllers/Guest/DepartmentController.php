<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('layouts.department');
    }

    public function showDepartment($name)
    {
        return view('general.department.'.$name);
    }
}
