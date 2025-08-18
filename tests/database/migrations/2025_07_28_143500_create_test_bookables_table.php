<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('test_bookables', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->decimal('base_cost', 10, 2);
            $table->decimal('unit_cost', 10, 2);
            $table->string('currency', 3);
            $table->string('unit');
            $table->integer('maximum_units')->nullable();
            $table->integer('minimum_units')->nullable();
            $table->boolean('is_cancelable')->default(false);
            $table->boolean('is_recurring')->default(false);
            $table->integer('sort_order')->nullable();
            $table->integer('capacity')->nullable();
            $table->string('style')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('test_bookables');
    }
};
