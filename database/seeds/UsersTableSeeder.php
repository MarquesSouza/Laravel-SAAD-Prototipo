<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'email' => 'jonasjunior@ifto.edu.br',
            'name'  => 'jonas',
            'password'=>  bcrypt('123'),
            'matricula'=> '00000000000',
            'telefone'=>'000000000',
            'status'=>'1',
        ]);
    }
}
