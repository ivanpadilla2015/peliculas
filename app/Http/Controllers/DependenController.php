<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dependencia;

class DependenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depen = Dependencia::orderBy('id', 'desc')->paginate(5);
        return view('dependencia.dependencia', compact('depen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dependencia.depen_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombredepen' =>'required',
        ]);
        $equip = Dependencia::create($request->all()); 
        $equip->save();
        toastr()->success('creada correctamente');
        return redirect('/dependen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $depe = Dependencia::findOrFail($id);
        return view('dependencia.depen_editar', compact('depe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombredepen' =>'required',
        ]);
        $depe = Dependencia::findOrFail($id);
        $depe->fill($request->all());
        $depe->save();
        toastr()->success('Actualizada correctamente');
        return redirect('/dependen');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
