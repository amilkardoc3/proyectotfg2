<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PersonaController extends Controller
{
    public function __construct(){
        $this->middleware(['permission:persona.index'])->only('index');
        $this->middleware(['permission:persona.create'])->only('create');
        $this->middleware(['permission:persona.edit'])->only('edit');
        $this->middleware(['permission:persona.destroy'])->only('destroy');
        $this->middleware(['permission:persona.store'])->only('store');
        $this->middleware(['permission:persona.update'])->only('update');
        $this->middleware(['permission:persona.show'])->only('show');
    }
    public function index(){
        // $personas = Persona::all();
        // $personas = Persona::where('estado', 1)->where('apellido', 'like', 'd%')->get();
        $personas = Persona::paginate(10);
        // dd($personas);
        return view('admin/persona/index')->with('personas', $personas);
    }

    public function spatie(){
        // $permisos = Role::all();
        // dd($permisos);
        $rol = new Role();
        $rol->name = "cliente";
        $rol->save();
        $permiso = new Permission();
        $permiso->name = "edit venta";
        $permiso->save();
        dd($permiso);
        // $role = Role::create(['name' => 'enc venta']);
        // $permission = Permission::create(['name' => 'create venta']);
    }

    public function create(){
        // dd("mostrar la vista de creación");
        // $this->store();
        return view('admin/persona/create');
    }

    public function store(Request $request){
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->save();
        
        return redirect()->route('persona.index');
    }

    public function edit($id){
        $persona = Persona::find($id);
        return view('admin/persona/edit')->with('persona', $persona);
        // dd($persona);
    }

    public function update(Request $request, $id){
        $persona = Persona::find($id);
        // dd($id);
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->save();
        return redirect()->route('persona.index');
    }

    public function show($id){
        $persona = Persona::find($id);
        // return view('admin/persona/show')->with('persona', $persona);
        dd($persona);
    }

    public function destroy($id){
        $persona = Persona::find($id);
        if($persona->estado == 0){
            $persona->estado = 1;
        }
        elseif ($persona->estado == 1) {
            $persona->estado = 0;    
        }    
        $persona->save();
        return redirect()->route('persona.index');
    }
    
    public function exportar_pdf(){
        dd("Exportar PDF");
    }
}
