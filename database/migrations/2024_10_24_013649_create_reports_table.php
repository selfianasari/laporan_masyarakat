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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('category', 100); 
            $table->text('description'); 
            $table->enum('status', ['pending', 'in_process', 'completed', 'rejected'])->default('pending'); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null'); 
            $table->text('resolution_notes')->nullable(); 
            $table->timestamp('resolved_at')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
