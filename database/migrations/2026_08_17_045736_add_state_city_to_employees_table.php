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
        Schema::table('employees', function (Blueprint $table) {
            $table->foreignId('country_id')->after('salary')->constrained('countries');
            $table->foreignId('state_id')->after('country_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->after('state_id')->constrained()->onDelete('cascade');

            $table->foreignId('skill_id')->constrained('skills');
            $table->foreignId('department_id')->constrained('departments');

            $table->date('joining_date');
            $table->string('photo')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
};
