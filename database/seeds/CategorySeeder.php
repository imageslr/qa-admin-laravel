<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['分类一', '分类二', '分类三', '分类四', '分类五'];
        foreach ($names as $name) {
            \App\Models\Category::insert([
                'name'            => $name,
                'created_at'      => now(),
                'updated_at'      => now()
            ]);
        }
    }
}
