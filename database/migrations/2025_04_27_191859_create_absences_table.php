<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->date('date');
            $table->enum('igazolas', ['szülői', 'igazgatói', 'igazolatlan', 'orvosi']);
            $table->string('reason')->nullable();
            $table->timestamps();
        });


        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('absence_subject', function (Blueprint $table) {
            $table->foreignId('absence_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->primary(['absence_id', 'subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
