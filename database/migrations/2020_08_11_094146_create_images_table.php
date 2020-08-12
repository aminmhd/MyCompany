<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('images' , function (Blueprint $table) {
          $table->increments('image_id');
          $table->string('image_name');
          $table->bigInteger('image_user_id');
          $table->string('image_type');
          $table->string('image_text');
          $table->timestamps();
          $table->softDeletes('deleted_at');




      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
