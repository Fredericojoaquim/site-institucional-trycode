<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dominio;

class DominioController extends Controller
{
    //

    public function index()
    {
        $dominio=Dominio::all();
        return view('Admin.dominio.listar',['dominios'=>$dominio]);
    }

    public function create()
    {
        return view('Admin.dominio.registar');
    }


    public function store(Request $request)
    {
        $d=new Dominio();
        $d->ltd=$request->ltd;
        $d->registro=$request->registro;
        $d->transferencia=$request->transferencia;
        $d->renovacao=$request->renovacao;
        $d->descricao=$request->descricao;
        $d->save();
        return back()->with('success', 'Dados salvos com sucesso!');

    }

    public function edit($id)
    {
        $dominio=Dominio::findOrFail(addslashes($id));
    
        return view('Admin.dominio.alterar',['dominio'=>$dominio]);

    }

    public function update(Request $request)
    {
        $s=[
            'ltd'=>$request->ltd,
            'registro'=>$request->registro,
            'transferencia'=>$request->transferencia,
            'renovacao'=>$request->renovacao,
            'descricao'=>$request->descricao
            ];
            $dominio=Dominio::findOrFail(addslashes($request->dominio_id));
           
            $dominio->update($s);

            return back()->with('success', 'Dados salvos com sucesso!');
    }
}
