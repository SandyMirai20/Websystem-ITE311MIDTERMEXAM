<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name'          => 'Crisandy Gomez',
                'email'         => 'gomez@gmail.com',
                'password_hash' => password_hash('gomezadmin123', PASSWORD_DEFAULT),
                'role'          => 'admin',
            ],
            [
                'name'          => 'Urabe Chan',
                'email'         => 'urabe@gmail.com',
                'password_hash' => password_hash('urabestudent123', PASSWORD_DEFAULT),
                'role'          => 'student',
            ],
        ];

        $userModel = new UserModel();
        foreach ($users as $user) {
            $exists = $userModel->where('email', $user['email'])->first();
            if (! $exists) {
                $userModel->insert($user);
            }
        }

        echo "Users seeded successfully!\n";
    }
}
