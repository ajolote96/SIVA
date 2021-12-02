<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
            ])->syncRoles(['Jefe RH (Division)', 'Jefe lugares de trabajo','Jefe RH (Zona)','Secretario General (Zona)']);

        User::create([
                'name' => 'jefe autoriza vacaciones',
                'email' => 'jefe@gmail.com',
                'password' => bcrypt('password')
                ])->syncRoles(['Jefe lugares de trabajo']);

        User::create([
                    'name' => 'empleado',
                    'email' => 'empleado@gmail.com',
                    'password' => bcrypt('password')
                    ])->syncRoles(['Personal']);

        //User::factory(10)->create();
        
        
    }
}
