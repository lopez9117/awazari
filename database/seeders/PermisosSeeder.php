<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'admin.usuarios.index']);
        Permission::create(['name' => 'admin.usuarios.create']);
        Permission::create(['name' => 'admin.usuarios.edit']);
        Permission::create(['name' => 'admin.usuarios.destroy']);

        Permission::create(['name' => 'admin.roles.index']);
        Permission::create(['name' => 'admin.roles.create']);
        Permission::create(['name' => 'admin.roles.edit']);
        Permission::create(['name' => 'admin.roles.destroy']);
    }
}
