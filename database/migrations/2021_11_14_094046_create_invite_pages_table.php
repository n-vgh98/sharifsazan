<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invite_pages', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("title")->comment("0 is sabte nam  1 is azmoon fani 2 is azmoon amali");
            $table->foreignId("category_id")->constrained("invite_categories")->onDelete("cascade")->onUpdate("cascade");
            $table->text("text1");
            $table->text("text2")->nullable()->comment("baraye vaghti hast ke mikhan dar do ghesmate matn dashte bashan");
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
        Schema::dropIfExists('invite_pages');
    }
}
