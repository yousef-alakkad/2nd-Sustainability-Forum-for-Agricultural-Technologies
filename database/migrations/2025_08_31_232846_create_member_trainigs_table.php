<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTrainigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_trainigs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('member_trainigs');
    }
}
