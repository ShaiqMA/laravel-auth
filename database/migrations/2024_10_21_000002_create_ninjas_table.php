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
        Schema::create('ninjas', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // belangrijk voor foreign keys
            $table->id();
            $table->string('name');
            $table->string('skill');
            $table->unsignedBigInteger('dojo_id'); // moet exact BIGINT unsigned zijn
            $table->timestamps();
            $table->text('bio'); // Voeg dit toe voor $table->timestamps()


            // foreign key
            $table->foreign('dojo_id')
                  ->references('id')
                  ->on('dojos')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ninjas');
    }
};
