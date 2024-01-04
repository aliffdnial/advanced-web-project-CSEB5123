<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
                [
                    'name'=>'Fikri',
                    'email'=>'fikri@itms.my',
                    'password'=> bcrypt('fikripass1234'),
                    'usertype' => 2,
                    'bunit' => 'ITMS',
                    'phonenum' => '011478963'
                    ],
                [
                    'name'=>'Wan',
                    'email'=>'wan@itms.my',
                    'password'=> bcrypt('wanpass1234'),
                    'usertype' => 2,
                    'bunit' => 'ITMS',
                    'phonenum' => '011234567'
                    ],
                [
                    'name'=>'Ahmad',
                    'email'=>'ahmad@itms.my',
                    'password'=> bcrypt('ahmadpass1234'),
                    'usertype' => 2,
                    'bunit' => 'ITMS',
                    'phonenum' => '011345678'
                    ],
                [
                    'name'=>'Aiman',
                    'email'=>'aiman@itms.my',
                    'password'=> bcrypt('aimanpass1234'),
                    'usertype' => 2,
                    'bunit' => 'ITMS',
                    'phonenum' => '011456789'
                    ],
                [
                    'name'=>'Adel',
                    'email'=>'adel@itms.my',
                    'password'=> bcrypt('adelpass1234'),
                    'usertype' => 2,
                    'bunit' => 'ITMS',
                    'phonenum' => '011567890'
                    ],
                [
                    'name'=>'Luqman',
                    'email'=>'luqman@itms.my',
                    'password'=> bcrypt('luqmanpass1234'),
                    'usertype' => 2,
                    'bunit' => 'ITMS',
                    'phonenum' => '011678901'
                    ], 
                ];
        
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
