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
        <div class="flex justify-between items-center text-4xl mb-5">
            <h3>Spefikatie geleverde producten</h3>
        </div>
    </div>
    <div class="flex justify-start mb-5 items-center">
    <div class="mr-5">
                <strong>Startdatum:</strong> {{ $LevarancierSpec->MinDatumLevering }}
            </div>
            <div class="mr-5">
                <strong>Einddatum:</strong> {{ $LevarancierSpec->MaxDatumLevering }}
            </div>
            <div class="mr-5">
                <strong>Productnaam:</strong> {{ $LevarancierSpec->ProductNaam }}
            </div>
            <div class="mr-5">
                <strong>Allergenen:</strong> {{ $LevarancierSpec->Allergenen }}
            </div>
    </div>
    <table class="w-3/4 text-black bg-white  m-auto mt-5 mb-5">
        <thead>
            <th class="px-4 py-2 border border-gray-300">Datum Levering</th>
            <th class="px-4 py-2 border border-gray-300">aantal</th>

        </thead>
        <tbody>
        @if(empty($LevarancierSpec))
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 text-white bg-red-700 text-center" colspan="2">
                        er is op dit moment een technische storing, probeer het later nog een keer.</td>
                </tr>
                @else
                @foreach($LevarancierSpec as $spec)
                <tr>
                    <td class="px-4 py-2 border border-gray-300"> {{$spec->DatumLevering}}</td>
                    <td class="px-4 py-2 border border-gray-300"> {{$spec->ProductCount}}</td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

</body>
</html>