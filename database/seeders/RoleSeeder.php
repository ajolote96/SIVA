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

        //Permiso para ver el modulo de administracion
        $permiso0 = Permission::create(['name' => 'admin']); //Todos los jefes pueden ver el modulo de admin, mas manipularlo esta en restricciones 

        $permiso0->assignRole($jefe_sg);
        $permiso0->assignRole($jefe_lt);
        $permiso0->assignRole($jefe_rhz);
        $permiso0->assignRole($jefe_rhd);
        
        //Permiso de validacion de vacaciones
        $permiso1 = Permission::create(['name' => 'vacaciones']); //Un secretario y jefe de lt solo autorizan las vacaciones

        $permiso1->assignRole($jefe_sg);
        $permiso1->assignRole($jefe_lt);

        //Permiso de asignar roles
        $permiso2 = Permission::create(['name' => 'roles']);

        
        $permiso2->assignRole($jefe_rhd);

        //Permiso de gestionar los dias feriados
        $permiso3 = Permission::create(['name' => 'diaferiado']);

        $permiso3->assignRole($jefe_rhd);

        //Permiso de gestionar los periodos de vacaciones
        $permiso4 = Permission::create(['name' => 'periodos']);

        $permiso4->assignRole($jefe_rhd);

        //Permiso crud de empleados
        $permiso5 = Permission::create(['name' => 'empleados']);

        $permiso5->assignRole($jefe_rhz);
        $permiso5->assignRole($jefe_rhd);
        $permiso5->assignRole($jefe_sg);
        $permiso5->assignRole($jefe_lt);

         //Imprimir el formato de vacaciones
         $permiso6 = Permission::create(['name' => 'formato']);

         $permiso6->assignRole($jefe_lt);
         $permiso6->assignRole($jefe_rhz);
         $permiso6->assignRole($jefe_rhd);


    }
}
