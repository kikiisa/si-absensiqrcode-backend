<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pegawai::all();
        return view('pegawai.index', compact('data'));
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
        $request->validate([
            'nomor' => 'required|unique:pegawais,nomor',
            'immei' => 'required|unique:pegawais,immei',
            'email' => 'required|email|unique:pegawais,email',
            'username' => 'required|unique:pegawais,username',
        ]);
        $data = Pegawai::create([
            'uuid' => Uuid::uuid4()->toString(),
            'username' => $request->username,
            'name' => $request->name,
            'immei' => $request->immei,
            'nomor' => $request->nomor,
            'email' => $request->email,
        ]);
        if ($data) {
            return redirect()->route('pegawai.index')->with('success', 'Berhasil!');
        } else {
            return redirect()->route('pegawai.index')->with('error', 'Gagal!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $pegawai = Pegawai::where('uuid', $id)->first();

        if ($request->has('rekap') || $request->has('cetak')) {
            $bulan = $request->get('month');
            $tahun = $request->get('year');

            $query = Absensi::with('pegawai')->where('pegawai_id', $pegawai->id);

            if ($request->has('rekap')) {
                $query->whereMonth('tgl_absen', $bulan)->whereYear('tgl_absen', $tahun);
                $view = 'pegawai.detail';
            } elseif ($request->has('cetak')) {
                $query->whereMonth('tgl_absen', $bulan)->whereYear('tgl_absen', $tahun);
                $view = 'absensi.report';
            }

            $data = $query->get();
        } else {
            $data = Absensi::with('pegawai')->where('pegawai_id', $pegawai->id)->get();
            $view = 'pegawai.detail';
        }
        return view($view, compact('data', 'pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pegawai::all()->where('uuid', $id)->first();
        return view('pegawai.edit', compact('data'));
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
        $data  = Pegawai::find($id);
        $data->update($request->all());
        if ($data) {
            return redirect()->route('pegawai.index')->with('success', 'Berhasil!');
        } else {
            return redirect()->route('pegawai.index')->with('error', 'Gagal!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data  = Pegawai::find($id);
        $data->delete();
        if ($data) {
            return redirect()->route('pegawai.index')->with('success', 'Berhasil!');
        } else {
            return redirect()->route('pegawai.index')->with('error', 'Gagal!');
        }
    }

    public function detail(Request $request)
    {
    }
}
