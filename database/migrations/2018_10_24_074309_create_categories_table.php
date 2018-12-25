<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('code');
            $table->integer('parent_category_id')->nullable();
            $table->timestamps();
        });

         DB::table('categories')->insert(
            array(
                array(
                    'id' => 2,
                    'name' => 'Antibiotics',
                    'slug' => 'antibiotics',
                    'code' => '0.1'
                ),
                array(
                    'id' => 12,
                    'name' => 'Orthodontics',
                    'slug' => 'orthodontics',
                    'code' => '0.2'
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
