<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('test_bookable_bookings', function (Blueprint $table) {
            $table->id();
            $table->morphs('bookable');
            $table->morphs('customer');
            $table->timestamp('starts_at');
            $table->timestamp('ends_at');
            $table->decimal('price', 10, 2);
            $table->integer('quantity')->default(1);
            $table->decimal('total_paid', 10, 2);
            $table->string('currency', 3);
            $table->json('formula')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->schemalessAttributes('options');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('test_bookable_bookings');
    }
};
