<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlacklistsTable extends Migration
{
    public function up()
    {
        Schema::create('blacklists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('idcard');
            $table->string('bankType');
            $table->string('bankAccount');
            $table->string('date');
            $table->integer('amount');
            $table->string('productName')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blacklists');
    }
}

