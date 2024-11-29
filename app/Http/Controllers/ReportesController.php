<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
                "inicio" => $fInicio,
                "fin" => $fFin
            ];
        }
        //return $fechas;
        $datos = DB::table('tickets')
            ->whereBetween('created_at', [$fechas["inicio"], $fechas["fin"]])
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('verReportes')->with('datos', $datos);
    }


    public function exportarExcel()
    {
        Excel::create('Laravel Excel', function ($excel) {
            $excel->sheet('Productos', function ($sheet) {
                $lista = Ticket::all();
                $sheet->fromArray($lista);
            });
        })->export('xls');
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
