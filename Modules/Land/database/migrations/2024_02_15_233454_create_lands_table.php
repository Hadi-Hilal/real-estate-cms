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
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('slug')->unique();
            $table->json('description');
            $table->json('keywords');
            $table->json('content');
            $table->string('image');
            $table->text('3d')->nullable();
            $table->string('tapu');
            $table->json('slides')->nullable();
            $table->foreignId('land_type_id')->constrained('land_types');
            $table->json('regulation');
            $table->integer('ratio');
            $table->double('space');
            $table->double('net_space');
            $table->double('deduction');
            $table->double('price');
            $table->string('code')->nullable();
            $table->foreignId('country_id')->unsigned()->constrained('countries');
            $table->foreignId('state_id')->unsigned()->constrained('states');
            $table->foreignId('city_id')->unsigned()->constrained('cities');
            $table->foreignId('district_id')->unsigned()->constrained('districts');
            $table->foreignId('created_by')->unsigned()->constrained('users');
            $table->enum('publish', ['published', 'archived'])->default('published');
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
        Schema::dropIfExists('lands');
    }
};
