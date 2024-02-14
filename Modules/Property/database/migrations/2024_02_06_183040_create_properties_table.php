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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('slug')->unique();
            $table->json('description');
            $table->json('keywords');
            $table->json('content');
            $table->string('image');
            $table->json('slides')->nullable();
            $table->foreignId('property_type_id')->nullable()->constrained('property_types')->nullOnDelete();
            $table->double('price')->nullable();
            $table->string('code')->nullable();
            $table->foreignId('country_id')->unsigned()->constrained('countries');
            $table->foreignId('state_id')->unsigned()->constrained('states');
            $table->foreignId('city_id')->unsigned()->constrained('cities');
            $table->foreignId('created_by')->unsigned()->constrained('users');
            $table->enum('category', ['project', 'resale'])->default('project');
            $table->enum('publish', ['published', 'archived'])->default('published');
            $table->boolean('citizenship')->default(false);
            $table->boolean('featured')->default(true);
            $table->bigInteger('visites')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
