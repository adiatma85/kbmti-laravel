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

    // Testing email
    public function sendingEmail(){
        return $this->eventEmailResponse('adiatma85@gmail.com', 'TESTING EMAIL IN FTP SERVER', 'lucky', 'ini bodi text', 'https://google.com');
    }
}
