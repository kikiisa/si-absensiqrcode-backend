<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use App\Models\PengaturanAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;

class ApiController extends Controller
{

    private $path = 'data-image/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function formatDistance($distance)
    {
        // Jarak kurang dari 1 kilometer, tampilkan dalam meter
        if ($distance < 1000) {
            return round($distance);
        } else {
            // Jarak 1 kilometer atau lebih, tampilkan dalam kilometer
            return round($distance / 1000, 2);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function haversineDistance($lat1, $lon1, $lat2, $lon2)
    {
        // Convert degrees to radians
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        // Haversine formula
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;

        $a = sin($dlat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        // Earth radius in meters
        $earthRadius = 6371000;

        // Calculate the distance
        $distance = $earthRadius * $c;

        return $distance;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $set = PengaturanAbsensi::all()->first();
        $resultRadius = $this->haversineDistance($set->latitude, $set->longitude, $request->latitude, $request->longitude);
        $file = $request->file('image');
        $getIdByUuid = Pegawai::all()->where('uuid',$request->uuid)->first();
        $waktuSaatini = Carbon::now();
        $absensiHariIni = Absensi::where('pegawai_id',$getIdByUuid->id)
            ->whereDate('created_at', Carbon::today());
        if ($resultRadius > $set->radius) {
            return response()->json([
                'status' => false,
                'message' => 'Jangkauan Anda Terlalu Jauh',
            ]);
        } else {
            if($getIdByUuid->status == 0)
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Tidak Dapat Melakukan Absensi, Akun Anda Di Nonaktifkan Hubungi Admin',
                ]);
            }else{
                if ($set->qrcode_masuk == $request->token) {
                    $currentTime = Carbon::now();
                    $jamAbsensi = Carbon::parse($set->jam_masuk);
                    // cek hari ini jika sudah melakukan absensi
                    if ($absensiHariIni->count() > 0) {
                        return response()->json([
                            'status' => false,
                            'message' => 'Anda Telah Melakukan Absensi Masuk'
                        ]);
                    } else {
                        if ($currentTime > $jamAbsensi) {
                            $name = $file->hashName();
                            $file->move($this->path, $name);
                            Absensi::create([
                                'uuid' => Uuid::uuid4()->toString(),
                                'pegawai_id' => $getIdByUuid->id,
                                'tgl_absen' => Carbon::today(),
                                'masuk' => $waktuSaatini->toTimeString(),
                                'foto_masuk' => $name,
                                'status' => 'terlambat'
                            ]);
                            return response()->json([
                                'status' => true,
                                'message' => 'Berhasil Melakukan Absensi dengan Status Anda Terlambat',
                            ]);
                        } else {
                            $name = $file->hashName();
                            $file->move($this->path, $name);
                            Absensi::create([
                                'uuid' => Uuid::uuid4()->toString(),
                                'pegawai_id' => $getIdByUuid->id,
                                'tgl_absen' => Carbon::today(),
                                'masuk' => $waktuSaatini->toTimeString(),
                                'foto_masuk' => $name,
                                'status' => 'hadir'
                            ]);
                            return response()->json([
                                'status' => true,
                                'message' => 'Berhasil Melakukan Absensi Dengan Status HADIR',
                            ]);
                        }
                    }
    
                // absensi keluar
                } else {
                    $jamKeluar = Carbon::parse($set->jam_keluar);
                    if($absensiHariIni->count() > 0)
                    {
                        if($waktuSaatini < $jamKeluar)
                        {
                            return response()->json([
                                'status' => false,
                                'message' => 'Belum Waktunya Pulang'
                            ]);
                        }else{
                            if(empty($absensiHariIni->first()->keluar))
                            {
                                $name = $file->hashName();
                                $file->move($this->path, $name);
                                $absensiHariIni->update([
                                    'foto_keluar' => $name,
                                    'keluar' => $waktuSaatini->toTimeString()
                                ]);
                                return response()->json([
                                    'status' => true,
                                    'message' => 'Berhasil Melakukan Absensi Pulang',
                                ]);
                            }else{
                                return response()->json([
                                    'status' => false,
                                    'message' => 'Anda Telah Melakukan Absensi Pulang'
                                ]); 
                            }
                        }
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'Silahkan Absensi Masuk Terlebih Dahulu'
                        ]);
                    }
                   
                }
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
