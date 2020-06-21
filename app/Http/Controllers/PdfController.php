<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\User;
use PDF;

class PdfController extends Controller
{
    public function Pdfgeneral()
    {
        $data = Equipo::all();
        $pdf= PDF::loadView('pdfs.general_pdf', compact('data'));
        return $pdf->stream();
    }

    public function consulxuser()
    {
        $users = User::all();
        return view('pdfs.consulxusuario', compact('users'));
    }

    public function Pdfxusuario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|not_in:0',
        ]);
        $user = User::findOrFail($request->input('id'));
        $pdf= PDF::loadView('pdfs.pdfxusuario', compact('user'));
        return $pdf->stream();
        
    }
    
    public function Pdfgrupoxuser()
    {
        
        $data = User::all();
        $pdf= PDF::loadView('pdfs.pdf_grop', compact('data'));
        return $pdf->stream();
    }

    public function Pdfgrupoxusern()
    {
        $data = User::all();
        $pdf= PDF::loadView('pdfs.pdf_gropn', compact('data'));
        return $pdf->stream();
    }
}
