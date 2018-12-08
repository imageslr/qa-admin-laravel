<?php

use Illuminate\Database\Seeder;

class QaPairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\QaPair::class, 100)->create();
    }
}
