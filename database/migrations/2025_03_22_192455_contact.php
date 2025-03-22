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
        db::unprepared(     
            'CREATE TABLE Contact (
 Id                     INT UNSIGNED                NOT NULL    AUTO_INCREMENT
,Straat                 VARCHAR(255)                NOT NULL
,Huisnummer             VARCHAR(10)                 NOT NULL
,Postcode               VARCHAR(10)                 NOT NULL
,Stad                   VARCHAR(255)                NOT NULL
,IsActief 			   	Bit 				        not null 	default 1
,Opmerking 				Varchar(255) 		        null 		default null
,DatumAangemaakt 		Datetime(6) 		        not null 	default NOW(6)
,DatumGewijzigd 		Datetime(6) 		        not null 	default NOW(6)
,PRIMARY KEY (Id)
);'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Contact');
    }
};
