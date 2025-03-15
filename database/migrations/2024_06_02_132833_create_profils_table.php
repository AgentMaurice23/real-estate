<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('user_id'); // Supprimez la valeur par défaut
            $table->string('role')->default('standart'); // Exemple de champ pour l'adresse
            $table->string('country')->nullable();// Exemple de champ pour l'adresse
            $table->string('identity_piece', 2048)->nullable();// Exemple de champ pour l'adresse
            $table->string('city')->nullable(); // Exemple de champ pour l'adresse
            $table->longText('biographie')->nullable();// Exemple de champ pour l'adresse
            $table->string('profession')->nullable();// Exemple de champ pour l'adresse

            $table->string('address')->nullable(); // Exemple de champ pour l'adresse
            $table->string('phone')->nullable(); // Exemple de champ pour le téléphone
            $table->date('birthdate')->nullable(); // Exemple de champ pour la date de naissance
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('profile_cover_path', 2048)->nullable();

            $table->string('postal_code')->nullable();
            $table->string('website')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('agency_type')->nullable();
            $table->string('foundation_year')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('manager_email')->nullable();
            $table->string('manager_phone')->nullable();
            $table->text('services')->nullable();
            $table->text('service_areas')->nullable();
            $table->integer('current_listings')->nullable();
            $table->text('property_types')->nullable();
            $table->string('license')->nullable();
            $table->string('insurance')->nullable();
            $table->string('opening_hours')->nullable();
            $table->text('description')->nullable();
            $table->text('photos')->nullable();
            $table->boolean('terms_accepted')->default(false);
            $table->boolean('privacy_accepted')->default(false);
            $table->boolean('publish_consent')->default(false);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
