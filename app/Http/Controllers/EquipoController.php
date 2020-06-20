<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\User;
use App\Tipoequipo;
use App\Modelo;
use App\Marca;
use Illuminate\Http\Request;
use Image;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::find(1);
        //dd($equipo);
        //dump($users->equipos);
         //return $equipo;
        //$equipos = Equipo::where('user_id', '<>', 1)->get();
        //return $equipos;
        $equipos = Equipo::all();
        return view('index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('activo', 1)->get();//usuarios activos
        $tipos = Tipoequipo::all();
        $modlos = Modelo::all();
        $marcs = Marca::all();
        return view('create', compact('users','tipos','modlos', 'marcs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
       $request->validate([
            'descripcion' =>'required',
            'user_id' => 'required|integer|not_in:0',
            'namefoto' => 'required|image',
            'tipoequipo_id' => 'required|integer|not_in:0',
            'modelo_id' => 'required|integer|not_in:0',
            'serial' =>'required|unique:equipos',
        ]);
        if($request->file('namefoto'))
        {
           $image = $request->file('namefoto');
           $filename = $request['serial'].'.'.$image->extension(); 
           Image::make($request->file('namefoto'))->resize(144, 144)
           ->save('images/equipos/'.$filename);     
        }
            
        $equip =  Equipo::create($request->all()); ///crea el registro
        $equip->fill(['namefoto' => $filename])->save();//actualiza
        
        toastr()->success('creado correctamente');
        return redirect('/equipos');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
       
        $equipo1 = Equipo::find($equipo->id);
        $losmios = Equipo::where('user_id', $equipo->user_id)->where('id','<>', $equipo->id)->get();
        //return $equipo;
        return view('show', compact('equipo', 'losmios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('activo', 1)->get(); //usuarios activos
        $tipos = Tipoequipo::all();
        $modlos = Modelo::all();
        $marcs = Marca::all();
        $equipo = Equipo::findOrFail($id);
        return view('editar', compact('equipo','users','tipos','modlos', 'marcs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //return $request->all();;
        $equip = Equipo::findOrFail($id);
        $equip->fill($request->all());
        if($request->file('namefoto'))
        {
           $image = $request->file('namefoto');
           $filename = $request['serial'].'.'.$image->extension(); 
           Image::make($request->file('namefoto'))->resize(144, 144)
           ->save('images/equipos/'.$filename);  
           $equip->fill(['namefoto' => $filename]);   
        }
        
        $equip->save();

        toastr()->success('Actualizado correctamente');
        return redirect('/equipos');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
