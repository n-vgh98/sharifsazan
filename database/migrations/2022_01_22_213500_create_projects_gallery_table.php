<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_gallery', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("path");
            $table->string("alt");
            $table->text('description')->nullable();
            $table->tinyInteger('mode')->comment('0->ejraei,1->birooni');
            $table->foreignId("uploader_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("project_id")->constrained("projects")->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('projects_gallery');
    }
}
