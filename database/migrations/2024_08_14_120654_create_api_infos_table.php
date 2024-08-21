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
        Schema::create('api_info', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->index()->nullable();
            $table->string('name');
            $table->string('endpoint');
            $table->string('method');
            $table->text('description')->nullable();
            $table->json('parameters')->nullable(); // JSON column for request parameters
            $table->json('responses')->nullable();  // JSON column for response structures
            $table->text('example_request')->nullable(); // New column for example request
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_info');
    }
};
