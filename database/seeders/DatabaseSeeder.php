<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Berobat;
use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\ResepObat;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Admin
        User::create(
            [
                'nama_lengkap'  =>  'Admin',
                'username'      =>  'admin',
                'password'      =>  bcrypt('admin'),
                'level'         =>  'ADMIN',
                'email'         =>  'admin@example.com'
            ]
        );
        User::create(
            [
                'nama_lengkap'  =>  'Dokter',
                'username'      =>  'dokter',
                'password'      =>  bcrypt('dokter'),
                'level'         =>  'DOKTER',
                'email'         =>  'dokter@example.com'
            ]
        );
        User::create(
            [
                'nama_lengkap'  =>  'Apoteker',
                'username'      =>  'apoteker',
                'password'      =>  bcrypt('apoteker'),
                'level'         =>  'APOTEKER',
                'email'         =>  'apoteker@example.com'
            ]
        );

        // Dokter
        Dokter::create([
            'nama_dokter'  =>  'Dokter',
        ]);
        Pasien::create([
            'nama_pasien'   =>  'Chandra',
            'jenis_kelamin' =>  'pria',
            'umur' =>  '21 Tahun',
        ]);
        Pasien::create([
            'nama_pasien'   =>  'Miftah',
            'jenis_kelamin' =>  'wanita',
            'umur' =>  '25 Tahun',
        ]);
        Pasien::create([
            'nama_pasien'   =>  'Wini',
            'jenis_kelamin' =>  'wanita',
            'umur' =>  '19 Tahun',
        ]);
        Pasien::create([
            'nama_pasien'   =>  'Rianto',
            'jenis_kelamin' =>  'pria',
            'umur' =>  '27 Tahun',
        ]);

        Berobat::create([
            'pasien_id'         => 1,
            'dokter_id'         => 1,
            'tgl_berobat'       => new DateTime('now'),
            'keluhan_pasien'    => 'Badan pegal, kepala pusing',
            'hasil_diagnosa'    => 'Kurang Istirahat'
        ]);

        Berobat::create([
            'pasien_id'         => 2,
            'dokter_id'         => 1,
            'tgl_berobat'       => new DateTime('now'),
            'keluhan_pasien'    => 'Bibir Sakit',
            'hasil_diagnosa'    => 'Sariawan'
        ]);

        Berobat::create([
            'pasien_id'         => 3,
            'dokter_id'         => 1,
            'tgl_berobat'       => new DateTime('now'),
            'keluhan_pasien'    => 'Kepala Pusing Sebelah',
            'hasil_diagnosa'    => 'Migrain'
        ]);

        // Apoteker
        ResepObat::create([
            'berobat_id'        => 3,
            'obat_id'           => 3,
        ]);
        Obat::create([
            'nama_obat'         => 'Panadol',
        ]);
        Obat::create([
            'nama_obat'         => 'Bodrex',
        ]);
        Obat::create([
            'nama_obat'         => 'Paramex',
        ]);
    }
}
