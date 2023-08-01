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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained('users');
            $table->string('name');
            $table->tinyInteger('age')->default(0);
            $table->boolean('sex');
            $table->integer('weight')->default(0);
            $table->string('breed');
            $table->string('epilepsy_type')->nullable();
            $table->string('medication')->nullable();
            $table->boolean('reminder');
            $table->text('other');
            $table->integer('number')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
