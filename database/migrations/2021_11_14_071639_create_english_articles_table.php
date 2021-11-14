<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnglishArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constrained("article_categories")->onDelete("cascade")->onUpdate("cascade");
            $table->string("title");
            $table->text("text");
            $table->tinyInteger("language")->default(1)->comment("0 is fa and 1 is en");
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
        Schema::dropIfExists('english_articles');
    }
}
