<?php

use Illuminate\Database\Seeder;

class UploadFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\UploadFile::class, 50)->create();
    }
}
