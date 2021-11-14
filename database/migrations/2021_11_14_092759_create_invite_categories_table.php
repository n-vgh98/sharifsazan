<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInviteCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invite_categories', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("register_form_link");
            $table->text("technical_exam_form_link")->comment("fani");
            $table->text("practical_exam_form_link")->comment("amali");
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
        Schema::dropIfExists('invite_categories');
    }
}
