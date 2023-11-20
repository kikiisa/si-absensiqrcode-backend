<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->with('error','Login Gagal');

    }
    public function logout(Request $request)
    {
        Auth::logout(); // Melakukan logout pengguna
        $request->session()->invalidate(); // Menghapus sesi pengguna
        $request->session()->regenerateToken(); // Membuat token sesi baru
        return redirect()->route('auth'); // Redirect pengguna ke halaman login setelah logout
    }

    public function loginNip(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'nip' => 'required'
        ]);
        if($validate->fails())
        {
            return response()->json(['errors' => $validate->errors()],422);
        }
        $data = Pegawai::all()->where('nomor',$request->nip);
        if($data->count() > 0)
        {
            return response()->json([
                'status' => true,
                'message' => 'Login Berhasil',
                'data' => $data->first()
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }
    }
}
