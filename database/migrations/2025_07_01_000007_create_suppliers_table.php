<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel aanmaken
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('Naam');
            $table->string('ContactPersoon');
            $table->string('LeverancierNummer');
            $table->string('LeverancierType');
            $table->boolean('IsActief')->default(true);
            $table->string('Opmerking', 255)->nullable();
            $table->dateTime('DatumAangemaakt', 6)->nullable();
            $table->dateTime('DatumGewijzigd', 6)->nullable();
        });

        // Stored procedure aanmaken
        DB::unprepared("
            DROP PROCEDURE IF EXISTS GetActieveLeveranciers;

            CREATE PROCEDURE GetActieveLeveranciers()
            BEGIN
                SELECT * FROM suppliers WHERE IsActief = 1;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Stored procedure verwijderen
        DB::unprepared("DROP PROCEDURE IF EXISTS GetActieveLeveranciers");

        // Tabel verwijderen
        Schema::dropIfExists('suppliers');
    }
};
