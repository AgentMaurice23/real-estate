<?php

// database/migrations/xxxx_xx_xx_create_rooms_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Supprimez la valeur par défaut
            // $table->foreignId('house_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['studio','chambre_salon', '2_chambres_salon', '3_chambres_salon','4_chambres_salon','5_chambres_salon','plus']);
            $table->integer('number_of_rooms');
            $table->integer('surface')->nullable();
            $table->integer('number_of_beds')->nullable();
            $table->enum('bed_type', ['simple', 'double', 'queen', 'king'])->nullable();
            $table->boolean('private_bathroom')->default(false);
            $table->text('equipments')->nullable();
            $table->date('available_from')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('condition')->nullable();
            $table->boolean('balcony')->default(false);
            $table->string('view')->nullable();
            $table->json('images')->nullable();
            $table->boolean('available');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
