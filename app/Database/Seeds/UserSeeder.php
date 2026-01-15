<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Data dummy users untuk testing
        $data = [
            [
                'nama_user' => 'Administrator',
                'username'  => 'admin',
                'password'  => password_hash('admin123', PASSWORD_DEFAULT), // Password: admin123
                'foto'      => 'default.png',
                'level'     => '1', // Level 1 = Super Admin
            ],
            [
                'nama_user' => 'Pengurus Pondok',
                'username'  => 'pengurus',
                'password'  => password_hash('pengurus123', PASSWORD_DEFAULT), // Password: pengurus123
                'foto'      => 'default.png',
                'level'     => '2', // Level 2 = Pengurus
            ],
            [
                'nama_user' => 'Ustadz Ahmad',
                'username'  => 'ustadz',
                'password'  => password_hash('ustadz123', PASSWORD_DEFAULT), // Password: ustadz123
                'foto'      => 'default.png',
                'level'     => '3', // Level 3 = Ustadz/Staff
            ],
        ];

        // Insert semua data
        foreach ($data as $user) {
            $this->db->table('user')->insert($user);
        }

        echo "✅ 3 dummy users berhasil dibuat!\n";
        echo "   Username: admin     | Password: admin123     | Level: 1 (Super Admin)\n";
        echo "   Username: pengurus  | Password: pengurus123  | Level: 2 (Pengurus)\n";
        echo "   Username: ustadz    | Password: ustadz123    | Level: 3 (Ustadz/Staff)\n";
    }
}
