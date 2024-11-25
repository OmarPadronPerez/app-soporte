<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Collections\SheetCollection;
use Maatwebsite\Excel\Facades\Excel;

use function Symfony\Component\Clock\now;
use function Symfony\Component\String\b;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $now = Carbon::now();
        $fechas = "";
        $datos = "";

        if ($request == "") {
            $fechas = $request;
        } else {
            $fInicio = date_format($now, 'Y') . "-" . date_format($now, 'm') . "-1";
            $fFin = date_format($now->endOfMonth(), "Y-m-d");
            $fechas = [
                "inicio"=>$fInicio, 
                "fin"=>$fFin
            ];
        }
        //return $fechas;
        $datos=DB::table('tickets')
        ->whereBetween('created_at', [$fechas["inicio"], $fechas["fin"]])
        ->get();

        return view('verReportes')->with('datos', $datos);
    }

    public function exportarExcel(){
        $tickets=Ticket::all();
        return Excel::create('tickets',function($excel) use ($tickets){
            $excel->sheet('Tickets', function($sheet) use ($tickets){
                $sheet->fromArray($tickets->toArray());
            });
        })->download('tickets.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
