<?php

use App\Models\Company;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->foreignIdFor(Company::class)->constrained()->restrictOnDelete();
            $table->string('phone')->nullable();
            $table->string('image_path', 2048)->nullable();
            $table->date('join_date')->nullable();
            $table->integer('created_by')->constrained()->on('users');
            $table->integer('updated_by')->constrained()->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
