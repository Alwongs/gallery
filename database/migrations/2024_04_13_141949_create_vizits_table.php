<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVizitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vizits', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('user_agent')->nullable();
            $table->string('query_string')->nullable();
            $table->string('request_uri')->nullable();
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
        Schema::dropIfExists('vizits');
    }
}
