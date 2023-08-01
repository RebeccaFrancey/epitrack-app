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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('duration')->default(0);
            $table->boolean('awake_asleep')->nullable();
            $table->string('severity')->nullable();
            $table->boolean('emergency_med')->nullable();
            $table->boolean('body')->nullable();
            $table->boolean('movement')->nullable();
            $table->boolean('mouth')->nullable();
            $table->boolean('bladder')->nullable();
            $table->boolean('vomit')->nullable();
            $table->boolean('responsive')->nullable();
            $table->boolean('chewing')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
