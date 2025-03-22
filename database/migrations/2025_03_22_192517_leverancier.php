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
            'create table Leverancier (
                Id 					    int 			unsigned 	not null    auto_increment
                ,ContactId			    int 			unsigned 	not null    
                ,naam 				    varchar(255) 				not null 
                ,ContactPersoon 	    varchar(255) 		 		not null
                ,LeverancierNummer      varchar(11)					not null
                ,Mobiel      		    varchar(11) 				not null
                ,IsActief 			    Bit 						not null 	default 1
                ,Opmerking 			    Varchar(255) 				null 		default null
                ,DatumAangemaakt 	    Datetime(6) 				not null 	default NOW(6)
                ,DatumGewijzigd 	    Datetime(6) 				not null 	default NOW(6)
                ,primary key (Id)
                ,FOREIGN KEY (ContactId) REFERENCES contact(id)
                );'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Leverancier');
    }
};
