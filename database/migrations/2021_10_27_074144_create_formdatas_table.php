<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formdatas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('country_name');
            $table->string('state_name');
            $table->string('city_name');
            $table->mediumText('address');
            $table->mediumText('profile_img');
            $table->mediumText('resume');
            $table->string('qualification1_name');
            $table->mediumText('qualification1_certificate');
            $table->string('qualification2_name');
            $table->mediumText('qualification2_certificate');
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
        Schema::dropIfExists('formdatas');
    }
}
