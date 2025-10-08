<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_shops', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('region')->nullable();
            $table->string('educational_level')->nullable();
            $table->string('educational_background')->nullable();
            $table->string('job_title')->nullable();
            $table->string('organization')->nullable();
            $table->integer('approve')->nullable();
            $table->string('code')->nullable();
            $table->integer('qrcode')->nullable();
            $table->tinyinteger('remind')->nullable();
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
        Schema::dropIfExists('work_shops');
    }
}
