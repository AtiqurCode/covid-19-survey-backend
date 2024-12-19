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
        Schema::create('covid_survey', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name field
            $table->string('email')->unique(); // Email field, unique constraint
            $table->date('date_of_birth')->nullable(); // Date of birth field
            $table->string('division')->nullable(); // Division field
            $table->enum('gender', ['Male', 'Female', 'Others'])->default('Male'); // Gender field
            $table->unsignedTinyInteger('vaccine_doses')->nullable(); // Vaccine doses field
            $table->text('problems')->nullable(); // Problems field
            $table->json('symptoms')->nullable(); // Symptoms field (stored as JSON)
            $table->string('1_dose_name', 30)->nullable(); // 1st dose name field
            $table->string('2_dose_name', 30)->nullable(); // 2nd dose name field
            $table->string('3_dose_name', 30)->nullable(); // 3rd dose name field
            $table->string('4_dose_name', 30)->nullable(); // 4th dose name field
            $table->timestamps(); // Created at and updated at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covid_survey');
    }
};
