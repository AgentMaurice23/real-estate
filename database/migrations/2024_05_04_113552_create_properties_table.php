<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Supprimez la valeur par défaut
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['en_attente', 'approuver', 'rejeter'])->default('en_attente');
            $table->boolean('sold')->default(false);
            $table->json('availability')->nullable();
            $table->integer('surface')->nullable();
            $table->integer('area');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('toilets');
            $table->integer('levels');
            $table->string('property_type');
            $table->integer('construction_year');
            $table->string('condition');
            $table->boolean('garage')->default(false);
            $table->boolean('garden')->default(false);;
            $table->integer('garden_area')->nullable();
            $table->boolean('pool')->default(false);;
            $table->string('heating_type');
            $table->boolean('air_conditioning')->default(false);
            $table->string('energy_certifications');
            $table->text('amenities');
            $table->json('documents')->nullable();

            $table->json('fichiers')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
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
