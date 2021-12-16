<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KaryawanSeeder extends Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nip' =>  $faker->unique()->nik(),
                'nama'    => $faker->name(),
                'alamat' => $faker->address(),
                'nohp' => $faker->phoneNumber(),
                'role' => $faker->randomElement(['manager', 'programmer', 'admin']),
                'status' => $faker->randomElement(['aktif', 'cuti', 'nonaktif']),
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ];

            // Using Query Builder
            $this->db->table('karyawan')->insert($data);
        }
    }
}
