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
        DB::unprepared(     
            '
        DROP PROCEDURE IF EXISTS SP_SpecsProducten;
        CREATE PROCEDURE SP_SpecsProducten(
            IN ProdSpecs VARCHAR(255)
        )
        BEGIN
            SELECT
                PPL.ProductId 
                ,PPL.Aantal AS ProductCount
                ,PROD.naam AS ProductNaam
                ,GROUP_CONCAT(DISTINCT ALLER.Naam SEPARATOR ", ") as Allergeen
                ,PPL.DatumLevering AS DatumLevering
                ,min(PPL.DatumLevering) AS MinDatumLevering
                ,max(PPL.DatumLevering) AS MaxDatumLevering

                FROM ProductPerLeverancier AS PPL

                LEFT JOIN product AS PROD
                ON PROD.Id = PPL.ProductId

                LEFT JOIN ProductPerAllergeen AS ALLPROD
                ON ALLPROD.ProductId = PPL.ProductId

                LEFT JOIN Allergeen AS ALLER
                ON ALLER.Id = ALLPROD.AllergeenId

                WHERE PROD.naam = ProdSpecs
                GROUP BY PPL.ProductId, PPL.Aantal, PROD.naam, PPL.DatumLevering, ALLER.Naam
                ORDER BY ProductCount asc;
                
        END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
