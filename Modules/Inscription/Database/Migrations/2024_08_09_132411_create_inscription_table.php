<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscription', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('aircraftOwner')->nullable();
            $table->string('aircraftType')->nullable();
            $table->integer('cruiseSpeed')->nullable();
            $table->string('email')->nullable();
            $table->string('firstName')->nullable();
            $table->integer('flightHours')->nullable();
            $table->string('fuelType')->nullable();
            $table->string('hotelRoomType')->nullable();
            $table->integer('hourlyConsumption')->nullable();
            $table->string('lastName')->nullable();
            $table->string('licenseNumber')->nullable();
            $table->date('licenseValidity')->nullable();
            $table->string('nationality')->nullable();
            $table->json('participants')->nullable(); 
            $table->string('passportNumber')->nullable();
            $table->date('passportValidity')->nullable();
            $table->string('phone')->nullable();
            $table->string('pilotFirstName')->nullable();
            $table->string('pilotLastName')->nullable();
            $table->integer('range')->nullable();
            $table->string('registration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscription');
    }
}
