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
        Schema::create('student_applications', function (Blueprint $table) {
            $table->id();

            $table->string('full_name');
            $table->string('father_name');
            $table->string('email');
            $table->string('phone');
            $table->string('gender');

            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();

            $table->foreignId('program_id')->constrained('programs')->cascadeOnDelete();
            $table->foreignId('session_id')->constrained('academic_sessions')->cascadeOnDelete();

            $table->string('cnic_bform')->nullable();
            $table->string('cnic_document')->nullable();

            $table->string('photo')->nullable();
            $table->string('documents')->nullable();

            $table->decimal('matric_marks', 5, 2)->nullable();
            $table->decimal('matric_total', 8, 2)->nullable();
            $table->decimal('inter_marks', 5, 2)->nullable();
            $table->decimal('inter_total', 8, 2)->nullable();

            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_applications');
    }
};
