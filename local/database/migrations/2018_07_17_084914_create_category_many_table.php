<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryManyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_many', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->tinyInteger('type')->default(0);
            $table->primary(['category_id','item_id']);
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
        Schema::dropIfExists('category_many');
    }
}
