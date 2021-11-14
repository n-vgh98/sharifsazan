<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarsiArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farsi_articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constrained("article_categories")->onDelete("cascade")->onUpdate("cascade");
            $table->string("title");
            $table->text("text");
            $table->tinyInteger("language")->default(0)->comment("0 is fa and 1 is en");
            $table->text("image");
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
        Schema::dropIfExists('farsi_articles');
    }
}
