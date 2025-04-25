<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index()
    {
        $users=DB::table('users')
        ->join('model_has_permissions','model_has_permissions.model_id','=','users.id')
        ->join('permissions','permissions.id','=','model_has_permissions.permission_id')
        ->select('users.name','users.id as codigo','users.email','users.telefone as telefone','permissions.name as perfil')
        ->get();

        return view('Admin.Usuario.listar',['users'=>$users]);
    }



    public function create()
    {
        return view('Admin.Usuario.registar');
    }

    public function store(Request $request)
     {

        $user = User::create([
            'name' =>addslashes( $request->name),
            'email' => addslashes($request->email),
            'password' => Hash::make($request->password),
            'telefone'=>addslashes($request->telefone)
        ])->givePermissionTo($request->perfil);


        return back()->with('success', 'Dados salvos com sucesso!');




     }
}
