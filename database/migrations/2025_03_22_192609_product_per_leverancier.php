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
            'create table ProductPerLeverancier(
                Id 							int 			unsigned 	not null 	auto_increment
                ,LeverancierId				int 			unsigned 	not null 	
                ,ProductId					int 			unsigned 	not null 	
                ,DatumLevering 				date						not null
                ,Aantal 					int				unsigned	not null
                ,DatumEerstVolgendeLevering date						null     	default null
                ,IsActief 					Bit 						not null 	default 1
                ,Opmerking 					Varchar(255) 				null 		default null
                ,DatumAangemaakt 			Datetime(6) 				not null 	default NOW(6)
                ,DatumGewijzigd 			Datetime(6) 				not null 	default NOW(6)
                ,primary key(id)
                ,foreign key(LeverancierId) references Leverancier(Id)
                ,foreign key(ProductId) references Product(Id)
                );'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ProductPerLeverancier');  
    }
};
