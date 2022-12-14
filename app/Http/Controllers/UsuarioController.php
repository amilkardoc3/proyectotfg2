<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Persona;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsuarioController extends Controller
{
    public function index(){
        // $usuarios = User::all();
        // $usuarios = User::where('estado', 1)->where('apellido', 'like', 'd%')->get();
        $usuarios = User::paginate(10);
        // dd($usuarios);
        return view('admin/usuario/index')->with('usuarios', $usuarios);
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
        $personas  = Persona::all();
        return view('admin/usuario/create')->with('personas', $personas);
    }

    public function store(Request $request){
        $usuario = new User();
        $usuario->email = $request->email;
        $usuario->persona_id = $request->persona_id;
        $persona = Persona::find($request->persona_id);
        $usuario->name = $persona->nombre.' '.$persona->apellido;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        
        return redirect()->route('usuario.index');
    }

    public function edit($id){
        $usuario = User::find($id);
        $roles = Role::all();
        $permisos = Permission::all();
        return view('admin/usuario/edit')->with('usuario', $usuario)
        ->with('permisos', $permisos);
        // dd($usuario);
    }

    public function update(Request $request, $id){
        $usuario = User::find($id);
        $permiso = Permission::find($request->permiso_id);
        $usuario->givePermissionTo($permiso->name);
        $usuario->save();
        return redirect()->route('usuario.index');
    }

    public function show($id){
        $usuario = User::find($id);
        // return view('admin/usuario/show')->with('usuario', $usuario);
        dd($usuario);
    }

    public function destroy($id){
        $usuario = User::find($id);
        if($usuario->estado == 0){
            $usuario->estado = 1;
        }
        elseif ($usuario->estado == 1) {
            $usuario->estado = 0;    
        }    
        $usuario->save();
        return redirect()->route('usuario.index');
    }
    
    public function exportar_pdf(){
        dd("Exportar PDF");
    }
}
