<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $superUser = User::create([
            'email' => 'admin@admin.com',
            'name' => 'Admin',
            'password' => Hash::make('123456789'),
        ]);

        $doctor = User::create([
            'email' => 'doctor@doctor.com',
            'name' => 'Doctor',
            'password' => Hash::make('123456789'),
        ]);

        $head_of_department= User::create([
            'email' => 'head@head.com',
            'name' => 'Head_of_Department',
            'password' => Hash::make('123456789'),
        ]);





        $admin = Role::create(['name' => 'Admin']);
       // $cheif_medical_officer = Role::create(['name' => 'Chief medical officer']);
       $head_of_department_role = Role::create(['name' => 'Head of department']);
       $doctor_role = Role::create(['name' => 'Doctor']);
       $nurse = Role::create(['name' => 'Nurse']);

        Permission::create(['name' => 'create_department']);
        Permission::create(['name' => 'edit_department']);
        Permission::create(['name' => 'show_department']);
        Permission::create(['name' => 'delete_department']);

        Permission::create(['name' => 'create_speciality']);
        Permission::create(['name' => 'edit_speciality']);
        Permission::create(['name' => 'show_speciality']);
        Permission::create(['name' => 'delete_speciality']);

        Permission::create(['name' => 'create_cabinet']);
        Permission::create(['name' => 'edit_cabinet']);
        Permission::create(['name' => 'show_cabinet']);
        Permission::create(['name' => 'delete_cabinet']);

        Permission::create(['name' => 'create_area']);
        Permission::create(['name' => 'edit_area']);
        Permission::create(['name' => 'show_area']);
        Permission::create(['name' => 'delete_area']);

        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'edit_user']);
        Permission::create(['name' => 'show_user']);
        Permission::create(['name' => 'delete_user']);


        $head_of_department_role->syncPermissions([
            'create_speciality',
            'edit_speciality',
            'delete_speciality',
            'show_speciality',
            'create_cabinet',
            'edit_cabinet',
            'delete_cabinet',
            'show_cabinet',
            'create_area',
            'edit_area',
            'delete_area',
            'show_area',
            'create_user',
            'edit_user',
            'delete_user',
            'show_user',
        ]);

        $admin->syncPermissions([
            'create_speciality',
            'edit_speciality',
            'delete_speciality',
            'show_speciality',
            'create_cabinet',
            'edit_cabinet',
            'delete_cabinet',
            'show_cabinet',
            'create_area',
            'edit_area',
            'delete_area',
            'show_area',
            'create_user',
            'edit_user',
            'delete_user',
            'show_user',
            'create_department',
            'edit_department',
            'show_department',
            'delete_department',
        ]);



        $superUser->assignRole($admin);
        $doctor->assignRole($doctor_role);
        $head_of_department->assignRole($head_of_department_role);


    }
}
