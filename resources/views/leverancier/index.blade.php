<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    


    <div class="overflow-x-auto">
    <div class="mt-3" >
        <div class="flex justify-between items-center text-2xl mb-5">
            <h3>Levarancier overzicht</h3>
        </div>
    </div>
    <div class="flex justify-end mb-5 items-center">
        <form action="{{route('leverancier.index.filter')}}" method="post" class="flex items-center">
            @csrf
            startdatum: <input type="date" name="startdate" id="startdate" class="border border-gray-300 p-2 m-1.5">
            einddatum: <input type="date" name="enddate" id="enddate" class="border border-gray-300 p-2 m-1.5">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Maak selectie</button>
        </form>
    </div>
    <table class="w-3/4 text-white bg-white dark:bg-gray-800 m-auto mt-5 mb-5">
        <thead>
            <th class="px-4 py-2 border border-gray-300">LeverancierNaam</th>
            <th class="px-4 py-2 border border-gray-300">Contact Persoon</th>
            <th class="px-4 py-2 border border-gray-300">ProductNaam</th>
            <th class="px-4 py-2 border border-gray-300">ProductCount</th>
            <th class="px-4 py-2 border border-gray-300">specifikatie</th>

        </thead>
        <tbody>
        @if($Levarancier->isEmpty())
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 text-white bg-red-700 text-center" colspan="7">
                        er is op dit moment een technische storing, probeer het later nog een keer.</td>
                </tr>
                @else
            @foreach($Levarancier as $Levarancier)
                <tr>
                    <td class="px-4 py-2 border border-gray-300"> {{$Levarancier['LeverancierNaam']}}</td>
                    <td class="px-4 py-2 border border-gray-300"> {{$Levarancier['ContactPersoon']}}</td>
                    <td class="px-4 py-2 border border-gray-300"> {{$Levarancier['ProductNaam']}}</td>
                    <td class="px-4 py-2 border border-gray-300"> {{$Levarancier['ProductCount']}}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        <a href="{{ route('leverancier.specifiek', ['ProductNaam' => $Levarancier['ProductNaam'], 'startdate' => request('startdate'), 'enddate' => request('enddate')]) }}">Bekijk</a>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>


</div>

</div>
</body>
</html>


