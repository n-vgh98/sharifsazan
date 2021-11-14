<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('gender')->nullable()->comment("0 is male 1 is female");
            $table->string('job')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            // required fields for google login
            $table->string('provider', 20)->nullable();
            $table->string('provider_id')->nullable();
            $table->string('access_token')->nullable();
            // required fields for google login
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
