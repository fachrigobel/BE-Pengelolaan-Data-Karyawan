<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' =>  "fachrigobel",
            'password'    => password_hash('123', PASSWORD_DEFAULT)
        ];

        // Using Query Builder
        $this->db->table('user')->insert($data);
    }
}
