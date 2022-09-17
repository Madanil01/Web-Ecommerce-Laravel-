<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $provinces = Province::all();
        $cities = City::all();

        return view('livewire.profile', compact('user', 'provinces', 'cities'));
    }

    public function edit(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        if (($request->selectprovinsi != null) && ($request->selectprovinsi) != "0") {
            $user->province = $request->selectprovinsi;
        }
        if (($request->selectcity != null) && ($request->selectcity) != "0") {
            $user->city = $request->selectcity;
        }
        $user->district = $request->kecamatan;
        $user->kelurahan = $request->kelurahan;
        $user->post_code = $request->code;
        $user->alamat = $request->alamat;
        if (!empty($request->password)) {
            $this->validate($request, [
                'password' => 'min:8', 'confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->update();
        return back()->with('message', 'Data Berhasil di Perbarui');
    }
}
