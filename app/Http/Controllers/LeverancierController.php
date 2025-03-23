<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;


class LeverancierController extends Controller
{

    private $LevarancierModel;

    public function __construct()
    {
        $this->LevarancierModel = app('App\Models\Levarancier');
    }
    public function index(Request $request)
    {
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');

        if ($startdate == null) {
            $startdate = "1900-01-01";
        }
        if ($enddate == null) {
            $enddate = "2100-01-01";
        }
        // $date=date_create(");
        $startdate = new \DateTime($startdate);
        $enddate = new \DateTime($enddate);
        $startdate = $startdate->format('Y-m-d');
        $enddate = $enddate->format('Y-m-d');
        
        $perPage = 25;
        $page = $request->input('page', 1);
        $offset = ($page - 1) * $perPage;

        $total = DB::table('Leverancier')->count();

        // try catch looks if the SP exists
        try{
            $Levarancier = DB::select('CALL spReadLeverancierOverzicht(?, ?, ?, ?)', [$perPage, $offset, $startdate, $enddate]);
            
        } catch (\Exception $e) {
            //logs the error in the log
            Log::error('error reading Levra$Levarancier: ' . $e->getMessage());
            //makes an empty array if the SP doesn't exist
            $Levarancier = [];
        }
        
        //paginate

        $Levarancier = new LengthAwarePaginator($Levarancier, $total, $perPage, $page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

       

        return view('leverancier.index', compact('Levarancier'));
    }

    public function spec($ProductNaam)
    {
        $Levarancier = $this->LevarancierModel->find($ProductNaam);
        return view('leverancier.spec', compact('Levarancier'));
    }
}
