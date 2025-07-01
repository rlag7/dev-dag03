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

        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('Naam');
            $table->string('Code');
            $table->string('Omschrijving');
            $table->integer('AantalVolwassenen');
            $table->integer('AantalKinderen');
            $table->integer('AantalBabys');
            $table->integer('TotaalAantalPersonen');

            $table->boolean('IsActief')->default(true);
            $table->string('Opmerking', 255)->nullable();
            $table->dateTime('DatumAangemaakt', 6)->nullable();
            $table->dateTime('DatumGewijzigd', 6)->nullable();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
