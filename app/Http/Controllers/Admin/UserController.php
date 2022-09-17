<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Livewire\WithPagination;

class UserController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('adminMiddle');
    }
    public function user(Request $request)
    {

        $search = $request->search;
        if ($search) {
            $users = User::orderBy('name', 'asc')->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")->paginate(5);
            });
        } else {
            $users = User::orderBy('name', 'asc')->paginate(5);
        }

        return view('back.user', [
            'users' => $users,
        ]);
    }
    public function filter(Request $request)
    {
        $filter = $request->filter;
        if ($filter == 1) {
            $users = User::orderBy('name', 'asc')->paginate(5);
        }
        if ($filter == 2) {
            $users = User::orderBy('name', 'desc')->paginate(5);
        }
        if ($filter == 0) {
            $users = User::paginate(5);
        }

        return view('back.user', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('back.create-user');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
        ]);
        return redirect('admin/user')->with('message', 'Data Berhasil di Tambah');;
    }
    public function edit($id)
    {
        $userDetail = User::find($id);

        if ($userDetail) {
            $this->user = $userDetail;
        }
        return view('back.edit-user', compact('userDetail'));
    }

    public function update(Request $request, $id)
    {
        $userDetail = User::find($id);
        if (!empty($request->password)) {
            $this->validate($request, [
                'password' => 'min:8', 'confirmed',
            ]);
            $userDetail->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,
            ]);
        }else{
            $userDetail->update([
                'name' => $request->name,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,
            ]);
        }
        return redirect('admin/user')->with('message', 'Data Berhasil di Update');
    }

    public function destroy($id)
    {
        $userDetail = User::find($id);
        $userDetail->delete();

        return back()->with('message', 'Data Berhasil di Hapus');
    }
}
