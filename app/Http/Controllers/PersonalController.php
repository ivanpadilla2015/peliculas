<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dependencia;
use App\User;
use App\Equipo;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('activo', true)->orderBy('id', 'desc')->paginate(7);
        return view('personal', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depen = Dependencia::all();
        return view('crear_personal', compact('depen'));
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
            'name' =>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'dependencia_id' => 'required|integer|not_in:0',
            
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'dependencia_id' => $request->dependencia_id,
        ]);
        toastr()->success('creado correctamente');
        return redirect('/personal');
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
        $depen = Dependencia::all();
        $use = User::findOrFail($id);
        return view('editar_personal', compact('use','depen'));
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
        if ($id > 1) {
            $request->validate([
                'name' =>'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'required|min:5',
                'dependencia_id' => 'required|integer|not_in:0',
                
            ]);
            $user = User::findOrFail($id);
            $user->fill($request->all());
            $user->save();
            toastr()->success('Actualizado correctamente');
        }else {
            toastr()->error('Este Usuario no puede ser Actualizado');
            return back();
        }
        
        return redirect('/personal');    
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

    public function desactivarusuario($id)
    {
       if($id > 1) // el 1 es el sin usuario
       {
            $use = User::findOrFail($id);
            $use->activo = false;
            $use->save();
            Equipo::where('user_id', $id)
            ->update(['user_id' => 1]);
            toastr()->success('Eliminado correctamente');
       }else
        {
            toastr()->error('Este Usuario no puede ser Borrado');
            return back();
        }
        return redirect('/personal');  
    }
}
