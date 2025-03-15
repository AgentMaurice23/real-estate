<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    // public function up()
    // {
    //     Schema::create('lands', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('user_id'); // Clé étrangère
    //         $table->string('title');
    //         $table->integer('surface');
    //         $table->decimal('price', 10, 2);
    //         $table->string('land_type');
    //         $table->string('city');
    //         $table->string('address');
    //         $table->string('country');            
    //         $table->string('postal_code');
    //         $table->json('images');
    //         $table->json('documents');
    //         $table->json('availability')->nullable(); // Use JSON field for the availability array
    //         $table->text('description')->nullable();

    //         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
    //         $table->timestamps();
    //     });
    public function up(): void
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Supprimez la valeur par défaut
            $table->string('title');
            $table->text('description');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['en_attente', 'approuver', 'rejeter'])->default('en_attente');
            $table->boolean('sold')->default(false);
            $table->integer('surface')->nullable();
            $table->integer('area')->nullable();
            $table->string('land_type')->nullable();
            $table->string('zoning')->nullable();
            $table->string('services')->nullable();
            $table->string('topography')->nullable();
            $table->string('access')->nullable();
            $table->boolean('survey')->default(false);
            $table->json('images')->nullable();;
            $table->json('documents')->nullable();;
            $table->json('availability')->nullable(); // Use JSON field for the availability array
            $table->boolean('urban_certificate');
            $table->string('restrictions');
            $table->text('amenities');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lands');
    }
}
