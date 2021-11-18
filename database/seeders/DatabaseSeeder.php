<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
            'name' => 'Jhon Smith',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
            ])->syncRoles(['Jefe RH (Division)', 'Jefe lugares de trabajo']);

        User::factory(10)->create();

        
    }
}
