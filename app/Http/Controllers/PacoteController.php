<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacote;

class PacoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pacotes=Pacote::all();
       return view('Admin.pacotes.listar',['pacotes'=>$pacotes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pacotes.registar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p=new Pacote();
        $p->nomepacote=$request->nomePacote;
        $p->qtdSite=$request->qtdSite;
        $p->qtdemail=$request->numContaEmail;
        $p->armazenamento=$request->armazenamento;
        $p->qtdbd=$request->QtdBd;
        $p->tipossl=$request->tipoSSL;
        $p->tipo_suporte=$request->tipoSuporte;
        $p->preco=$request->preco;
        $p->save();
        return back()->with('success', 'Dados salvos com sucesso!');

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
        $p=Pacote::findOrFail(addslashes($id));
      
        return view('Admin.pacotes.editar',['pacote'=>$p]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $s=[
           
            'nomepacote'=>$request->nomePacote,
            'qtdSite'=>$request->qtdSite,
            'qtdemail'=>$request->numContaEmail,
            'armazenamento'=>$request->armazenamento,
            'qtdbd'=>$request->QtdBd,
            'tipossl'=>$request->tipoSSL,
            'tipo_suporte'=>$request->tipoSuporte,
            'preco'=>$request->preco,
            'URL'=>$request->url
        
            ];
            $pacote=Pacote::findOrFail(addslashes($request->pacote_id));
            $pacote->update($s);

            return back()->with('success', 'Dados salvos com sucesso!');
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
}
