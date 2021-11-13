<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleado = Role::create(['name' => 'Personal']);
        $jefe_sg = Role::create(['name' => 'Secretario General (Zona)']);
        $jefe_lt = Role::create(['name' => 'Jefe lugares de trabajo']);
        $jefe_rhz = Role::create(['name' => 'Jefe RH (Zona)']);
        $jefe_rhd = Role::create(['name' => 'Jefe RH (Division)']);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$jefe_sg, $jefe_lt, $jefe_rhz, $jefe_rhd]);
        Permission::create(['name' => 'vacaciones.edit'])->syncRoles([$jefe_rhz, $jefe_rhd]);
        Permission::create(['name' => 'vacaciones.update'])->syncRoles([$jefe_rhz, $jefe_rhd]);
        
    }
}
