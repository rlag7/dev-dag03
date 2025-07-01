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

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_id')->constrained('categories');
            $table->string('Naam');
            $table->string('SoortAllergie')->nullable();
            $table->string('Barcode');
            $table->date('Houdbaarheidsdatum');
            $table->string('Omschrijving');
            $table->string('Status');

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
        Schema::dropIfExists('product');
    }
};
