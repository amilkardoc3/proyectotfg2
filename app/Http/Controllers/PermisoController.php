<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    public function __construct(){
        // $this->middleware(['permission:permiso.index'])->only('index');
        // $this->middleware(['permission:permiso.create'])->only('create');
        // $this->middleware(['permission:permiso.edit'])->only('edit');
        // $this->middleware(['permission:permiso.destroy'])->only('destroy');
        // $this->middleware(['permission:permiso.store'])->only('store');
        // $this->middleware(['permission:permiso.update'])->only('update');
        // $this->middleware(['permission:permiso.show'])->only('show');
    }
    public function index(){
        // $permisos = Permission::all();
        // $permisos = Permission::where('estado', 1)->where('apellido', 'like', 'd%')->get();
        $permisos = Permission::orderBy('id','desc')->paginate(20);
        // dd($permisos);
        return view('admin/permiso/index')->with('permisos', $permisos);
    }

    public function create(){
        // dd("mostrar la vista de creación");
        // $this->store();
        return view('admin/permiso/create');
    }

    public function store(Request $request){
        $permission = Permission::create(['name' => $request->name]);
        return redirect()->route('permiso.index');
    }

    public function edit($id){
        $permiso = Permission::find($id);
        return view('admin/permiso/edit')->with('permiso', $permiso);
        // dd($permiso);
    }

    public function update(Request $request, $id){
        $permiso = Permission::find($id);
        $permiso->name = $request->name;
        $permiso->save();
        return redirect()->route('permiso.index');
    }

    public function show($id){
        $permiso = Permission::find($id);
        return view('admin/permiso/show')->with('permiso', $permiso);
    }

    public function destroy($id){
        $permiso = Permission::find($id);
        if($permiso->estado == 0){
            $permiso->estado = 1;
        }
        elseif ($permiso->estado == 1) {
            $permiso->estado = 0;    
        }    
        $permiso->save();
        return redirect()->route('permiso.index');
    }
}
