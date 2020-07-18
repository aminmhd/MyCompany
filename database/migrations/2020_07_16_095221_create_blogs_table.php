<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('blogs' , function (Blueprint $table) {
         $table->increments('blog_id');
         $table->string('blog_subject' , 400);
         $table->string('blog_user_name');
         $table->bigInteger('blog_user_id');
         $table->string('blog_description' , 1000)->default('!!sorry this field is empty!!');
         $table->string('blog_img');
         $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('blogs');
    }
}
