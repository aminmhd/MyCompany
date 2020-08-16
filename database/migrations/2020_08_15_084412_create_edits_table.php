<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edits', function (Blueprint $table) {
          $table->increments('edit_id');
          $table->bigInteger('edit_user_id');
          $table->bigInteger('edit_image_id');
          $table->longText('edit_image_address')->nullable();
          $table->string('edit_image_phone')->nullable();
          $table->longText('edit_image_explain')->nullable();
          $table->string('edit_image_text')->nullable();
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
        Schema::dropIfExists('edits');
    }
}
