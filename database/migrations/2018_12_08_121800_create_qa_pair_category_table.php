<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQaPairCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qa_pair_category', function (Blueprint $table) {
            $table->integer('qa_pair_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->primary(['qa_pair_id', 'category_id']); // 联合主键
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qa_pair_category');
    }
}
