<?php

namespace App\Http\Controllers;

use App\Models\Perfiles;
use App\Models\Permisos;
use Illuminate\Http\Request;

class PerfilesController extends Controller
{
    public function index(){
        return view('perfiles.list')->with('perfiles', Perfiles::paginate(10));
    }

    public function create(){
        return view('perfiles.create')->with('permisos', Permisos::all());
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|min:4'
        ]);

        $pe = new Perfiles();
        $pe->nombre = $request->nombre;
        $pe->save();

        foreach($request->permisos as $perm){
            $perNom = explode('-', $perm)[0];
            $permiso = Permisos::where('nombre', $perNom)->first();
            $pe->permisos()->attach($permiso->id, array('salt' => $perm));
        }

        session()->flash('toastMensaje', 'Perfil creado con éxito!');
        return redirect('/perfiles');
    }

    public function edit($id){
        $perfil = Perfiles::find($id);
        $permisos = Permisos::all();

        foreach($permisos as $per){
            $per->ver_activo = false;
            $per->crear_activo = false;
            $per->editar_activo = false;

            foreach($perfil->permisos as $act){
                if($act->id == $per->id){
                    if($act->pivot->salt == $per->nombre."-ver"){
                        $per->ver_activo = true;
                    }
                    if($act->pivot->salt == $per->nombre."-crear"){
                        $per->crear_activo = true;
                    }
                    if($act->pivot->salt == $per->nombre."-editar"){
                        $per->editar_activo = true;
                    }
                }
            }
        }

        return view('perfiles.edit')
            ->with('perfil', $perfil)
            ->with('permisos', $permisos)
        ;
    }

    public function update($id, Request $request){
        $request->validate([
            'nombre' => 'required|string|min:4'
        ]);

        $pe = Perfiles::find($id);
        $pe->nombre = $request->nombre;
        $pe->activo = $request->activo ? true : false;
        $pe->save();
        $pe->permisos()->detach();
        foreach($request->permisos as $perm){
            $perNom = explode('-', $perm)[0];
            $permiso = Permisos::where('nombre', $perNom)->first();
            //$permisos[$permiso->id] =  array('salt' => $perm);
            $pe->permisos()->attach($permiso->id, array('salt' => $perm));
        }

        session()->flash('toastMensaje', 'Perfil creado con éxito!');
        return redirect('/perfiles');
    }
}
