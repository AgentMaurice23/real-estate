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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('user_id'); // Supprimez la valeur par défaut
            $table->text('description');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['en_attente', 'approuver', 'rejeter'])->default('en_attente');
            $table->integer('area')->nullable();
            $table->integer('surface')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('total_floors')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('toilets')->nullable();
            $table->boolean('sold')->default(false);
            $table->boolean('elevator')->default(false);
            $table->boolean('balcony')->default(false);
            $table->integer('balcony_area')->nullable();
            $table->integer('construction_year');
            $table->string('heating_type');
            $table->boolean('air_conditioning')->default(false);
            $table->string('energy_certifications');
            $table->decimal('monthly_charges', 10, 2);
            $table->string('security');
            $table->text('amenities');
            $table->json('images')->nullable();
            $table->json('documents')->nullable();
            $table->json('availability')->nullable(); // Use JSON field for the availability array
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            $table->timestamps();
        });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
