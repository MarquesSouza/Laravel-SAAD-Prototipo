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
        factory(\App\Entities\Core::class,10)->create();
        factory(\App\Entities\TypeUser::class,10)->create();
        factory(\App\Entities\User::class,10)->create();
        factory(\App\Entities\Modality::class,10)->create();
        factory(\App\Entities\Ambient::class,10)->create();
        factory(\App\Entities\TypeActivity::class,10)->create();
        factory(\App\Entities\RDC::class,10)->create();
        factory(\App\Entities\PPC::class,10)->create();
        factory(\App\Entities\Activity::class,10)->create();
        factory(\App\Entities\UserTypeUser::class,5)->create();
        factory(\App\Entities\ActivityPCC::class,5)->create();
        factory(\App\Entities\Allocation::class,5)->create();
        factory(\App\Entities\Task::class,3)->create();



       /** factory(\App\Entities\User::class)->create([
            'email' => 'jonasjunior@ifto.edu.br',
            'name'  => 'jonas',
            'password'=>  bcrypt('123'),
            'matricula'=> '00000000000',
            'telefone'=>'000000000',
            'status'=>'1',
            'id_cores' =>'3',
        ]); **/
    }
}
