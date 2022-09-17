<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'Super Admin',
            'guard_name'=>'web'
        ]);
        Role::create([
            'name'=>'Administrator',
            'guard_name'=>'web'
        ]);
        Role::create([
            'name'=>'Editor',
            'guard_name'=>'web'
        ]);
        Role::create([
            'name'=>'Author',
            'guard_name'=>'web'
        ]);
        Role::create([
            'name'=>'Contributor',
            'guard_name'=>'web'
        ]);
        Role::create([
            'name'=>'Subscriber',
            'guard_name'=>'web'
        ]);
    }
}
