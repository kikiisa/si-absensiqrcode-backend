<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('q') == 'cetak')
        {
            $data = Absensi::with('pegawai')->get();
            return view('absensi.report',compact('data'));
        }else{
            $pegawai = Pegawai::all()->where('status',1);
            $data = Absensi::with('pegawai')->get();
            return view('absensi.index',compact('data','pegawai'));
        }
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
        $check = Absensi::where('pegawai_id',$request->pegawai_id)->
        whereDate('created_at', Carbon::today());
        if($check->count() > 0)
        {
            return redirect()->route('daftar-absensi.index')->with('error','Sudah Melakukan Absensi');
        }else{
            $data = Absensi::create([
                'uuid' => Uuid::uuid4()->toString(),
                'pegawai_id' => $request->pegawai_id,
                'tgl_absen' => Carbon::today(),
                'status' => $request->status
            ]);
            if($data)
            {
                return redirect()->route('daftar-absensi.index')->with('success','Berhasil!');
            }else{
                return redirect()->route('daftar-absensi.index')->with('error','Gagal!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
