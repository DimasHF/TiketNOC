<?php

namespace App\Http\Controllers;

use App\Models\tiket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class tiketcontroller extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('tiket')->with('success', 'Login Berhasil');
        }

        return back()->with('alert', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('alert', 'Logout Berhasil');
    }

    public function regview()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('logview')->with('success', 'Registrasi Berhasil');
    }

    public function listtiket()
    {
        $tikets = tiket::all();
        return view('tiket', ['tiket' => $tikets]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'keterangan' => ['required'],
        ]);

        tiket::create([
            'username' => $request->name,
            'keterangan' => $request->keterangan,
            'status' => 0,
            'noc' => Auth::user()->username,
        ]);

        return redirect()->route('tiket')->with('success', 'Tiket Berhasil Ditambahkan');
    }

    public function runtiket($id)
    {
        $tiket = tiket::find($id);
        $tiket->status = 1;
        $tiket->save();

        return redirect()->route('tiket')->with('success', 'Tiket Run');
    }

    public function donetiket($id)
    {
        $tiket = tiket::find($id);
        $tiket->status = 2;
        $tiket->save();

        return redirect()->route('tiket')->with('success', 'Tiket Done');
    }

    public function edit($id)
    {
        $tiket = tiket::find($id);
        return view('edit', ['tiket' => $tiket]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'keterangan' => ['required'],
        ]);

        $tiket = tiket::find($id);
        $tiket->username = $request->name;
        $tiket->keterangan = $request->keterangan;
        $tiket->save();

        return redirect()->route('tiket')->with('success', 'Tiket Berhasil Diubah');
    }

    public function delete($id)
    {
        $tiket = tiket::find($id);
        $tiket->delete();

        return redirect()->route('tiket')->with('success', 'Tiket Berhasil Dihapus');
    }
}
