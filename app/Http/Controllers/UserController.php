<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('user.main');
    }

    public function adminRegister(int $id) {
      $roles = Role::get();
      return view('user.admin-register')->with('roles',$roles);
    }

    public function register(Request $request) {
      // Valido; si falla, lanza una excepción
      $this->validate($request, [
          'name' => 'required|max:255',
          'username' => 'required|unique:users|max:255',
          'email' => 'required|email|unique:users',
          /*
          La contraseña debe ser, mínimo de 8 caracteres de longitud, y debe contener caracteres alfanuméricos
          (al menos 1 mayúscula y minúscula) y símbolos especiales
           */
          'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|confirmed', // Confirmed hace que el validador mire el campo con _confirmation
          'role' => 'required'
      ]);

      // Grabo
      $usuario = User::create([
          'name' => $request->name,
          'username' => $request->username,
          'email' => $request->email,
          'password' => Hash::make($request->password),
      ]);

      $rolAlumno = Role::findByName($request->role);
      $usuario->assignRole($rolAlumno);

      // Redirecciono
      return redirect()->route('usuarios');
  }

  public function view(int $id) {
        $usuario = User::find($id);
        return view('user.detalle')->with('usuario', $usuario);
  }

  public function destroy(User $usuario)
  {
    $usuario->delete();
    return back();
  }

  public function tableUsers() {
      $users = User::paginate(5);
      return view('user.admin-table-users')->with('users', $users);
  }

}
