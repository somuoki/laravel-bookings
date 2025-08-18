<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('test_bookable_availabilities', function (Blueprint $table) {
            $table->id();
            $table->morphs('bookable');
            $table->string('range');
            $table->string('from');
            $table->string('to');
            $table->boolean('is_bookable');
            $table->integer('priority')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('test_bookable_availabilities');
    }
};
