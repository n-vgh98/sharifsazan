<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karnames', function (Blueprint $table) {
            $table->id();
            $table->integer("amali")->nullable();
            $table->integer("fani")->nullable();
            $table->integer("final")->nullable();
            $table->tinyInteger("status")->nullable()->comment("1 is success and 0 is fail");
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('karnames');
    }
}
