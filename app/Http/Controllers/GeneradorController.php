<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF as PDF;
use App\Models\Producto;


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

    public function imprimirProductos()
    {
        $productos = Producto::where('stock', '>', 0)->get();
        $pdf = \PDF::loadView('ejemplo', compact('productos'));
        return $pdf->download('productos.pdf');
    }
}
