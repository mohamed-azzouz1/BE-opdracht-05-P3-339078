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
    
    <div class="mt-3" >
        <div class="flex flex-middel justify-between items-center text-2xl mb-5">
            <h3>Levarancier overzicht</h3>
        </div>
    </div>

    <div class="overflow-x-auto">
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
                    <td class="px-4 py-2 border border-gray-300"> {{$Levarancier ->LeverancierNaam}}</td>
                    <td class="px-4 py-2 border border-gray-300"> {{$Levarancier ->ContactPersoon}}</td>
                    <td class="px-4 py-2 border border-gray-300"> {{$Levarancier ->ProductNaam}}</td>
                    <td class="px-4 py-2 border border-gray-300"> {{$Levarancier ->ProductCount}}</td>

                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <div class="m-auto mt-5 mb-5 w-3/4">
            {{-- pagination buttons --}}
            {{$Levarancier->links() }}
        </div>

</div>

</div>
</body>
</html>


