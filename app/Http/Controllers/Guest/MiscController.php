<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MiscController extends Controller
{
    public function index()
    {
        return response()->json([
            'msg' => 'Anda bukanlah Admon',
            'type' => 'error'
        ]);
    }
}
