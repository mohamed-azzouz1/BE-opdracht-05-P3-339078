<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        DB::table('product')->insert([
            ['naam' => 'Mintnopjes', 'barcode' => '8719587231278'],
            ['naam' => 'Schoolkrijt', 'barcode' => '8719587326713'],
            ['naam' => 'Honingdrop', 'barcode' => '8719587327836'],
            ['naam' => 'Zure Beren', 'barcode' => '8719587321441'],
            ['naam' => 'Cola Flesjes', 'barcode' => '8719587321237'],
            ['naam' => 'Turtles', 'barcode' => '8719587322245'],
            ['naam' => 'Witte Muizen', 'barcode' => '8719587328256'],
            ['naam' => 'Reuzen Slangen', 'barcode' => '8719587325641'],
            ['naam' => 'Zoute Rijen', 'barcode' => '8719587322739'],
            ['naam' => 'Winegums', 'barcode' => '8719587327527'],
            ['naam' => 'Drop Munten', 'barcode' => '8719587322345'],
            ['naam' => 'Kruis Drop', 'barcode' => '8719587322265'],
            ['naam' => 'Zoute Ruitjes', 'barcode' => '8719587323256'],
            ['naam' => 'Drop ninja’s', 'barcode' => '8719587323277'],
        ]);

        DB::table('allergeen')->insert([
            ['naam' => 'Gluten', 'omschrijving' => 'Dit product bevat gluten'],
            ['naam' => 'Gelatine', 'omschrijving' => 'Dit product bevat gelatine'],
            ['naam' => 'AZO-Kleurstof', 'omschrijving' => 'Dit product bevat AZO-kleurstoffen'],
            ['naam' => 'Lactose', 'omschrijving' => 'Dit product bevat lactose'],
            ['naam' => 'Soja', 'omschrijving' => 'Dit product bevat soja'],
        ]);

        DB::table('contact')->insert([
            ['straat' => 'Van Gilslaan', 'huisnummer' => '34', 'postcode' => '1045CB', 'stad' => 'Hilvarenbeek'],
            ['straat' => 'Den Dolderpad', 'huisnummer' => '2', 'postcode' => '1067RC', 'stad' => 'Utrecht'],
            ['straat' => 'Fredo Raalteweg', 'huisnummer' => '257', 'postcode' => '1236OP', 'stad' => 'Nijmegen'],
            ['straat' => 'Bertrand Russellhof', 'huisnummer' => '21', 'postcode' => '2034AP', 'stad' => 'Den Haag'],
            ['straat' => 'Leon van Bonstraat', 'huisnummer' => '213', 'postcode' => '145XC', 'stad' => 'Lunteren'],
            ['straat' => 'Bea van Lingenlaan', 'huisnummer' => '234', 'postcode' => '2197FG', 'stad' => 'Sint Pancras'],
        ]);

        DB::table('leverancier')->insert([
            ['naam' => 'Venco', 'contactpersoon' => 'Bert van Linge', 'leveranciernummer' => 'L1029384719', 'mobiel' => '06-28493827'],
            ['naam' => 'Astra Sweets', 'contactpersoon' => 'Jasper del Monte', 'leveranciernummer' => 'L1029284315', 'mobiel' => '06-39398734'],
            ['naam' => 'Haribo', 'contactpersoon' => 'Sven Stalman', 'leveranciernummer' => 'L1029324748', 'mobiel' => '06-24383291'],
            ['naam' => 'Basset', 'contactpersoon' => 'Joyce Stelterberg', 'leveranciernummer' => 'L1023845773', 'mobiel' => '06-48293823'],
            ['naam' => 'De Bron', 'contactpersoon' => 'Remco Veenstra', 'leveranciernummer' => 'L1023857736', 'mobiel' => '06-34291234'],
            ['naam' => 'Quality Street', 'contactpersoon' => 'Johan Nooij', 'leveranciernummer' => 'L1029234586', 'mobiel' => '06-23458456'],
            ['naam' => 'Hom Ken Food', 'contactpersoon' => 'Hom Ken', 'leveranciernummer' => 'L1029234599', 'mobiel' => '06-23458477'],
        ]);

        DB::table('magazijn')->insert([
            ['ProductId' => 1, 'VerpakkingsEenheid' => 5, 'AantalAanwezig' => 453],
            ['ProductId' => 2, 'VerpakkingsEenheid' => 2.5, 'AantalAanwezig' => 400],
            ['ProductId' => 3, 'VerpakkingsEenheid' => 5, 'AantalAanwezig' => 1],
            ['ProductId' => 4, 'VerpakkingsEenheid' => 1, 'AantalAanwezig' => 800],
            ['ProductId' => 5, 'VerpakkingsEenheid' => 3, 'AantalAanwezig' => 234],
            ['ProductId' => 6, 'VerpakkingsEenheid' => 2, 'AantalAanwezig' => 345],
            ['ProductId' => 7, 'VerpakkingsEenheid' => 1, 'AantalAanwezig' => 795],
            ['ProductId' => 8, 'VerpakkingsEenheid' => 10, 'AantalAanwezig' => 233],
            ['ProductId' => 9, 'VerpakkingsEenheid' => 2.5, 'AantalAanwezig' => 123],
            ['ProductId' => 10, 'VerpakkingsEenheid' => 3, 'AantalAanwezig' => NULL],
            ['ProductId' => 11, 'VerpakkingsEenheid' => 2, 'AantalAanwezig' => 367],
            ['ProductId' => 12, 'VerpakkingsEenheid' => 1, 'AantalAanwezig' => 467],
            ['ProductId' => 13, 'VerpakkingsEenheid' => 5, 'AantalAanwezig' => 20],
        ]);

        DB::table('product_per_allergeen')->insert([
            ['ProductId' => 1, 'AllergeenId' => 2],
            ['ProductId' => 1, 'AllergeenId' => 1],
            ['ProductId' => 1, 'AllergeenId' => 3],
            ['ProductId' => 3, 'AllergeenId' => 4],
            ['ProductId' => 6, 'AllergeenId' => 5],
            ['ProductId' => 9, 'AllergeenId' => 2],
            ['ProductId' => 9, 'AllergeenId' => 5],
            ['ProductId' => 10, 'AllergeenId' => 2],
            ['ProductId' => 12, 'AllergeenId' => 4],
            ['ProductId' => 13, 'AllergeenId' => 1],
            ['ProductId' => 13, 'AllergeenId' => 4],
            ['ProductId' => 13, 'AllergeenId' => 5],
            ['ProductId' => 14, 'AllergeenId' => 5],
        ]);

        DB::table('product_per_leverancier')->insert([
            ['LeverancierId' => 1, 'ProductId' => 1, 'DatumLevering' => '2024-10-09', 'Aantal' => 23, 'DatumEerstVolgendeLevering' => '2024-10-16'],
            ['LeverancierId' => 1, 'ProductId' => 1, 'DatumLevering' => '2024-10-18', 'Aantal' => 21, 'DatumEerstVolgendeLevering' => '2024-10-25'],
            ['LeverancierId' => 1, 'ProductId' => 2, 'DatumLevering' => '2024-10-09', 'Aantal' => 12, 'DatumEerstVolgendeLevering' => '2024-10-16'],
            ['LeverancierId' => 1, 'ProductId' => 3, 'DatumLevering' => '2024-10-10', 'Aantal' => 11, 'DatumEerstVolgendeLevering' => '2024-10-17'],
            ['LeverancierId' => 2, 'ProductId' => 4, 'DatumLevering' => '2024-10-14', 'Aantal' => 16, 'DatumEerstVolgendeLevering' => '2024-10-21'],
            ['LeverancierId' => 2, 'ProductId' => 4, 'DatumLevering' => '2024-10-21', 'Aantal' => 23, 'DatumEerstVolgendeLevering' => '2024-10-28'],
            ['LeverancierId' => 2, 'ProductId' => 5, 'DatumLevering' => '2024-10-14', 'Aantal' => 35, 'DatumEerstVolgendeLevering' => '2024-10-21'],
            ['LeverancierId' => 2, 'ProductId' => 6, 'DatumLevering' => '2024-10-13', 'Aantal' => 30, 'DatumEerstVolgendeLevering' => '2024-10-21'],
            ['LeverancierId' => 3, 'ProductId' => 7, 'DatumLevering' => '2024-10-11', 'Aantal' => 12, 'DatumEerstVolgendeLevering' => '2024-10-19'],
            ['LeverancierId' => 3, 'ProductId' => 7, 'DatumLevering' => '2024-10-19', 'Aantal' => 23, 'DatumEerstVolgendeLevering' => '2024-10-26'],
            ['LeverancierId' => 3, 'ProductId' => 8, 'DatumLevering' => '2024-10-10', 'Aantal' => 12, 'DatumEerstVolgendeLevering' => '2024-10-17'],
            ['LeverancierId' => 3, 'ProductId' => 9, 'DatumLevering' => '2024-10-11', 'Aantal' => 1, 'DatumEerstVolgendeLevering' => '2024-10-18'],
            ['LeverancierId' => 4, 'ProductId' => 10, 'DatumLevering' => '2024-10-16', 'Aantal' => 24, 'DatumEerstVolgendeLevering' => '2024-10-30'],
            ['LeverancierId' => 5, 'ProductId' => 11, 'DatumLevering' => '2024-10-10', 'Aantal' => 37, 'DatumEerstVolgendeLevering' => '2024-10-17'],
            ['LeverancierId' => 5, 'ProductId' => 11, 'DatumLevering' => '2024-10-19', 'Aantal' => 60, 'DatumEerstVolgendeLevering' => '2024-10-26'],
            ['LeverancierId' => 5, 'ProductId' => 12, 'DatumLevering' => '2024-10-11', 'Aantal' => 45, 'DatumEerstVolgendeLevering' => NULL],
            ['LeverancierId' => 5, 'ProductId' => 13, 'DatumLevering' => '2024-10-12', 'Aantal' => 23, 'DatumEerstVolgendeLevering' => NULL],
            ['LeverancierId' => 7, 'ProductId' => 14, 'DatumLevering' => '2023-04-14', 'Aantal' => 20, 'DatumEerstVolgendeLevering' => NULL],
        ]);
    }
}
