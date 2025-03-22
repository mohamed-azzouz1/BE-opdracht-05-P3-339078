<div class="container">
    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h3>Messages</h3>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="overflow-x-auto">
    <table class="w-3/4 bg-white dark:bg-gray-800 m-auto mt-5 mb-5">
        <thead>
            <th class="px-4 py-2 border border-gray-300">klant naam</th>
            <th class="px-4 py-2 border border-gray-300">verzendatum</th>
            <th class="px-4 py-2 border border-gray-300">Vluchtnummer</th>
            <th class="px-4 py-2 border border-gray-300">bericht</th>
            <th class="px-4 py-2 border border-gray-300">verzending status</th>ve
            <th class="px-4 py-2 border border-gray-300">Wijzigen</th>
            <th class="px-4 py-2 border border-gray-300">Verwijderen</th>
        </thead>
        <tbody>
        @if($messages->isEmpty())
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 text-white bg-red-700 text-center" colspan="7">
                        er is op dit moment een technische storing, probeer het later nog een keer.</td>
                </tr>
                @else
            @foreach($messages as $message)
                <tr>
                    <td class="px-4 py-2 border border-gray-300"> {{$message ->customer_fullname}}</td>
                    <td class="px-4 py-2 border border-gray-300"> {{$message ->messageverzendatum}}</td>
                    <td class="px-4 py-2 border border-gray-300"> {{$message ->messagevluchtnumber}}</td>
                    <td class="px-4 py-2 border border-gray-300"> {{$message ->message}}</td>

                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <div class="m-auto mt-5 mb-5 w-3/4">
            {{-- pagination buttons --}}
            {{$messages->links() }}
        </div>

</div>

</div>
