<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['权限一', '权限二', '权限三', '权限四', '权限五'];
        foreach ($names as $name) {
            \App\Models\Permission::insert([
                'description' => $name
            ]);
        }
    }
}
