<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pickup_timeslots', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('inventory_source_id');
            $table->string('pickup_day')->nullable();
            $table->string('pickup_date')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('pickup_quota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup_timeslots');
    }
};
