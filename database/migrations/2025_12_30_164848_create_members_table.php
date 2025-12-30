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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('photo')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('speciality'); // Spécialité/Domaine de compétence
            $table->text('bio')->nullable();
            $table->string('village')->nullable();
            $table->enum('arrondissement', ['Mora', 'Tokombere', 'Kolofata'])->nullable();
            $table->string('address')->nullable(); // Adresse complète
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
