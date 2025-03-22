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
        DROP PROCEDURE IF EXISTS spReadLeverancierOverzicht;
        CREATE PROCEDURE spReadLeverancierOverzicht()
        BEGIN
            SELECT
                PPL.ProductId 
                ,LEV.id AS LeverancierId
                ,LEV.naam AS LeverancierNaam
                ,LEV.ContactPersoon
                ,LEV.LeverancierNummer
                ,LEV.Mobiel
                ,COUNT(DISTINCT PROD.naam) AS ProductCount
            
                FROM Leverancier AS LEV

                LEFT JOIN ProductPerLeverancier AS PPL
                ON LEV.id = PPL.LeverancierId

                LEFT JOIN product AS PROD
                ON PROD.Id = PPL.ProductId

                GROUP BY LEV.id, LEV.naam, LEV.ContactPersoon, LEV.LeverancierNummer, LEV.Mobiel
                ORDER BY ProductCount desc;
        END');




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS spReadLeverancierOverzicht');
    }
};
