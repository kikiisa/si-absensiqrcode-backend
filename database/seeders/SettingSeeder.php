<?php

namespace Database\Seeders;

use App\Models\PengaturanAbsensi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       PengaturanAbsensi::create([
            'longitude' => '123.1453079',
            'latitude' => '0.5332897',
            'qrcode_pulang' => 'pulang',
            'qrcode_masuk' => 'masuk',
            'jam_masuk' => Carbon::createFromTime(7,0,0),
            'jam_keluar' => Carbon::createFromTime(17,0,0),
            'radius'   => '200',
       ]);
    }
}
