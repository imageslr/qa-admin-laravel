<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['角色一', '角色二', '角色三', '角色四', '角色五'];
        foreach ($names as $name) {
            \App\Models\Role::insert([
                'name' => $name,
                'created_at'      => now(),
                'updated_at'      => now()
            ]);
        }
    }
}
