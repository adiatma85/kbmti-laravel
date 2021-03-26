<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Models\EventRegister;

class EventRegistration extends Controller
{
    public function index(){
        return view('general/event-registration/index-page');
    }

    public function storeEventRegistration(Request $request){
        return response()->json([
            'success' => true,
            'items' => $request
        ]);
    }
}
