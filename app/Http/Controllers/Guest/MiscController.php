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
    public function landingPage()
    {
        return view('general.index-landing-page');
    }
    // Department
    public function departmentTesting()
    {
        return view('general.department.rnc');
    }

    // Form Pendafataran
    public function pendaftaranStaff()
    {
        return view('general.pendaftaran-staff');
    }

    // Testing email
    public function sendingEmail()
    {
        return $this->eventEmailResponse('adiatma85@gmail.com', 'TESTING EMAIL IN FTP SERVER', 'lucky', 'ini bodi text', 'https://google.com');
    }

    // Accessing another server
    public function accessingAnotherServer()
    {
        $ch = curl_init();

        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, "https://google.com");
        // curl_setopt($ch, CURLOPT_HEADER, 0);

        // grab URL and pass it to the browser
        curl_exec($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);
    }
}
