<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

// Model
use App\Models\stafAhli as StafAhliModel;
use App\Models\applicantOption as ApplicantOptionModel;
use App\Models\applicantInterviewTime as ApplicantInterviewTime;
use App\Models\jadwalInterview as JadwalInterviewModel;


class stafAhli extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show the form
        $allocatedTimes = JadwalInterviewModel::all();
        return view('general.pendaftaran-staff', compact('allocatedTimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // For testing purpose only
        // return response()->json($request);

        $arrayData = [
            'name' => $request->name,
            'nim' => $request->nim,
            'no_wa' => $request->no_wa,
            'id_line' => $request->id_line,
            // if text
            // 'komitmen' => $request->komitmen
        ];

        // Fetch the data if there are duplicate
        $isExist = StafAhliModel::where($arrayData)->exists();
        if ($isExist) {
            return back()->with('err', 'Anda Telah Mendaftar!');
        }

        // Initiate the rar
        $komitmenName = Carbon::now() . ' ' . $request->name . '.' . $request->komitmen->extension();
        $request->komitmen->storeAs('rar/stafAhli/', $komitmenName);
        $arrayData['komitmen'] = $komitmenName;
        $staffAhli = StafAhliModel::create($arrayData);
        foreach ($request->dept as $departmen) {
            # code...
            ApplicantOptionModel::create([
                'staff_id' => $staffAhli->id,
                'option' => $departmen
            ]);
        }
        foreach ($request->time as $time) {
            # code...
            ApplicantInterviewTime::create([
                'staff_id' => $staffAhli->id,
                'jadwal_id' => $time
            ]);
            JadwalInterviewModel::find($time)->decrement('stock');
        }
        $staffAhli->save();
        return back()->with('msg', 'Terima kasih telah mendaftar, silakan menunggu pengumuman Anda.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Menunjukkan apakah nanti dia lulus atau tidak...
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Below is custom functions
    public function showPengumumanForm()
    {
        return view('general.pengumumanFormPendaftaran');
    }

    // To show the 
    public function postPengumumanForm(Request $request)
    {
        $dataRequest = explode(' - ', $request->unique_code);
        // return response()->json(compact('dataRequest'));
        try {
            $applicant = StafAhliModel::where([
                'id_line' => $dataRequest[0],
                'no_wa' => $dataRequest[1],
            ])->first();

            $response = [];
            if ($applicant) {
                if ($applicant->isAccepted) {
                    $response = array(
                        'success' => true,
                        'title' => 'Selamat!',
                        'msg' => 'Selamat, Anda telah diterima ke tahap selanjutnya. Harap hubungi LINE berikut untuk konfirmasi.',
                        'icon' => 'success'
                    );
                }
                // default
                $response = array(
                    'success' => false,
                    'title' => 'Yah, maaf ya...',
                    'err' => 'Anda tidak lolos ke tahap berikutnya',
                    'icon' => 'error'
                );
            } else {
                $response = array(
                    'success' => false,
                    'title' => 'Terjadi kesalahan',
                    'err' => 'Data Anda tidak terdaftar dalam database kita',
                    'icon' => 'warning'
                );
            }
            return response()->json($response);
            // return redirect()->back()->with(compact('response'));
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'title' => 'Terjadi kesalahan',
                'err' => 'Terjadi kesalahan pada Server',
                'icon' => 'warning'
            ];
        }
    }
}
