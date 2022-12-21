<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    public function __construct(){
        // $this->middleware(['permission:rol.index'])->only('index');
        // $this->middleware(['permission:rol.create'])->only('create');
        // $this->middleware(['permission:rol.edit'])->only('edit');
        // $this->middleware(['permission:rol.destroy'])->only('destroy');
        // $this->middleware(['permission:rol.store'])->only('store');
        // $this->middleware(['permission:rol.update'])->only('update');
        // $this->middleware(['permission:rol.show'])->only('show');
    }
    public function index(){
        // $roles = Role::all();
        // $roles = Role::where('estado', 1)->where('apellido', 'like', 'd%')->get();
        $roles = Role::orderBy('id','desc')->paginate(20);
        // dd($roles);
        return view('admin/rol/index')->with('roles', $roles);
    }

    public function create(){
        // dd("mostrar la vista de creación");
        // $this->store();
        return view('admin/rol/create');
    }

    public function store(Request $request){
        $role = Role::create(['name' => $request->name]);
        return redirect()->route('rol.index');
    }

    public function edit($id){
        $rol = Role::find($id);
        return view('admin/rol/edit')->with('rol', $rol);
        // dd($rol);
    }

    public function update(Request $request, $id){
        $rol = Role::find($id);
        $rol->name = $request->name;
        $rol->save();
        return redirect()->route('rol.index');
    }

    public function show($id){
        $rol = Role::find($id);
        return view('admin/rol/show')->with('rol', $rol);
    }

    public function destroy($id){
        $rol = Role::find($id);
        if($rol->estado == 0){
            $rol->estado = 1;
        }
        elseif ($rol->estado == 1) {
            $rol->estado = 0;    
        }    
        $rol->save();
        return redirect()->route('rol.index');
    }
}
