<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RedoSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Destroy old sliders table
        Schema::dropIfExists('sliders');
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('title')->nullable();
            $table->boolean('enabled')->default(false);
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
        Schema::dropIfExists('sliders');
    }
}
