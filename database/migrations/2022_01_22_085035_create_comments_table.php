<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("writer_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("parent_id")->nullable()->constrained("comments")->onDelete("cascade")->onUpdate("cascade");
            $table->text("text");
            $table->tinyInteger("status")->default(0)->comment("0 is not accept and 1 is accept");
            $table->integer("commentable_id");
            $table->text("commentable_type");
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
        Schema::dropIfExists('comments');
    }
}
