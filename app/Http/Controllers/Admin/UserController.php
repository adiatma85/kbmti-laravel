<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\_AdminControllerBase;
use Illuminate\Http\Request;
use App\Http\Requests\Users\Store;
use Illuminate\Support\Facades\Hash;

// Model
use App\Models\User;

class UserController extends _AdminControllerBase
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Admin/User/index-user', compact('users'));
    }

    /**
     * Function untuk menampilkan Formulir untuk Menambah User
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // View untuk form menambahkan User dari Admin
        return view('Admin/Users/create-user');
    }

    /**
     * Function untuk menyimpan user yang telah dimasukkan ke dalam formulir
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $this->middleware('isMasterAdminMiddleware');
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'adminId' => $request->adminId
        ])->save();
        return back()
            ->with('response', [
                'type' => 'success',
                'msg' => 'Penambahan User Baru telah berhasil!'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Showing the detail of User
        // Jujur Ak bingung ki sek an...
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thisUser = User::where('id', $id)->first();
        return view('Admin/User/edit-user', compact('thisUser'));;
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
        $thisUser = User::findOrFail($id);
        $thisUser->name = $request->name;
        $thisUser->adminId = $request->adminid;
        $thisUser->save();
        return back()
            ->with('response', [
                'type' => 'success',
                'msg' => 'Pengeditan user berhasil dilakukan!'
            ]);
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
        User::where('id', $id)->delete();
        return back()
            ->with('response', [
                'type' => 'success',
                'msg' => 'Penghapusan artikel berhasil dilakukan!'
            ]);
    }

    /**
     * Remove many resource from storage
     *
     * @param  int[]  $id
     * @return \Illuminate\Http\Response
     */
    public function massDestroy($ids){
        // Sek bingung
    }
}
