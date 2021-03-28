<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\_GuestControllerBase;

class MiscController extends _GuestControllerBase
{
    public function index()
    {
        // must returnig view...
        return response()->json([
            'msg' => 'Anda bukanlah Admon',
        ]);
    }

    // Landing Page
    public function landingPage(){
        return view('general.index-landing-page');   
    }

    // Form Pendafataran
    public function pendaftaranStaff(){
        return view('general.pendaftaran-staff');
    }
}
