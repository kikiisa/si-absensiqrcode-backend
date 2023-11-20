<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nomor' => 'T3119051',
            'username' => 'kiki',
            'name' => 'Mohamad Rizky Isa',
            'email' => 'kikiisa89@gmail.com',
            'immei' => '89840283408409380389',
        ]);
    }
}
