<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF as PDF;

class GeneradorController extends Controller
{
    public function imprimir()
    {
        // $pdf = PDF::loadView('ejemplo');
        // return $pdf->download('ejemplo.pdf');
       $today = Carbon::now()->format('d/m/y');
       $pdf =\PDF::loadView('ejemplo',compact('today'));
       return $pdf->download('ejemplo.pdf');

    }
}
