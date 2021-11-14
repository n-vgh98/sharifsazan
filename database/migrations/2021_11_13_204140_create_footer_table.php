<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer', function (Blueprint $table) {
            $table->id();
            $table->longText('about_us');
            $table->text('address');
            $table->string('phone_num');
            $table->string('mobile_num')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('mail_link')->nullable();
            $table->string('LinkedIn_link')->nullable();
            $table->string('face_link')->nullable();
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
        Schema::dropIfExists('footer');
    }
}
