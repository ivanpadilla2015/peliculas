<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use PDF;

class PdfController extends Controller
{
    public function Pdfgeneral()
    {
        $data = Equipo::all();
        $pdf= PDF::loadView('pdfs.general_pdf', compact('data'));
        return $pdf->stream();
    }

    public function Pdfxusuario()
    {
        $data = Equipo::all();
        $pdf= PDF::loadView('pdfs.general_pdf', compact('data'));
        return $pdf->stream();
    }
    
    public function Pdfgrupodepen()
    {
        $data = Equipo::all();
        $pdf= PDF::loadView('pdfs.general_pdf', compact('data'));
        return $pdf->stream();
    }
}
