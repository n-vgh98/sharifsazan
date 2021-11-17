<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("introduction");
            $table->text("description");
            $table->text("master_key_words")->nullable();
            $table->text("meta_descriptions")->nullable();
            $table->decimal("price", 20, 0);
            $table->tinyInteger("licensable")->comment("1 is ye and 0 is no");
            $table->string("master_name");
            $table->string("master_job");
            $table->tinyInteger("type")->comment("1 is physical and 0 is electronic");
            $table->tinyInteger("mode")->comment("1 is online and 0 is offline");
            $table->text("link")->nullable()->comment("for electronic courses");
            $table->text("introduction_v_link")->comment("for introduction video");
            $table->integer("off")->default(0)->comment("takhfifat be darsad");
            $table->bigInteger("use_time")->default(0)->comment("tedad dafat estefade baraye tain mizane mahboodiat");
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
        Schema::dropIfExists('courses');
    }
}
