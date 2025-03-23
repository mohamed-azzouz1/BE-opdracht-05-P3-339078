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
        CREATE PROCEDURE spReadLeverancierOverzicht(
            IN givLIMIT INT
            ,IN givOFFSET INT
            ,IN startdate DATE
            ,IN enddate DATE
        )
        BEGIN
            SELECT
                PPL.ProductId 
                ,PROD.naam AS ProductNaam
                ,LEV.id AS LeverancierId
                ,LEV.naam AS LeverancierNaam
                ,LEV.ContactPersoon
                ,SUM(PPL.Aantal) AS ProductCount
            
                FROM Leverancier AS LEV

                LEFT JOIN ProductPerLeverancier AS PPL
                ON LEV.id = PPL.LeverancierId

                LEFT JOIN product AS PROD
                ON PROD.Id = PPL.ProductId

                WHERE PPL.DatumLevering BETWEEN startdate AND enddate
                GROUP BY LEV.id, LEV.naam, LEV.ContactPersoon, PPL.ProductId, PROD.naam
                ORDER BY ProductCount desc
                LIMIT givLIMIT OFFSET givOFFSET;
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
