<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DomainNameApi\DomainNameAPI_PHPLibrary;
use App\Models\Dominio;

class DomainNameController extends Controller
{
    private $taxa_cambio=1000;

    public function precoReal($preco)
    {
        $preco_real= $preco+($preco*0.5);
        return $preco_real*$this->taxa_cambio;

    }




    public function verificarDominio(Request $request)
    {

        $tld=addslashes($request->tld);
      //  $user = \App\Models\User::where('name', 'João')->first();
        $preco_registro=Dominio::where('ltd', '.'.$tld)->first()->registro;
        //dd($tld);
        $dominio = addslashes($request->input('dominio'));

    // Verifica se o domínio tem TLD (ex: exemplo.com)
    if (!filter_var($dominio, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME)) {
        return response()->json(['status' => 'erro', 'message' => 'Domínio inválido']);
    }

    

   
    // Criando a instância da API
    $api = new DomainNameAPI_PHPLibrary(
        env('DOMAIN_USERNAME'),
        env('DOMAIN_PASSWORD')
    );

   

    try {
       
       $resultado=$api->CheckAvailability([$dominio],[$tld],1,'create');

        // Verifica se o domínio está disponível
        if (isset($resultado[0]['Status']) && $resultado[0]['Status'] == 'available') {
            $status = 'disponível';
            $message = 'O domínio "' . $dominio .".$tld".'" está disponível!';
           // $preco=$this->precoReal($preco_registro);
            $preco = number_format($preco_registro, 2, ',', '.') . ' ' . 'KZ';
        } else {
            $status = 'indisponível';
            $message = 'O domínio "' . $dominio .".$tld". '" não está disponível.';
            $preco = null;
        }

         // Retorna a resposta formatada
         return response()->json([
            'status' => $status,
            'message' => $message,
            'preco' =>  $preco
        ]);

    } catch (\Exception $e) {
        return response()->json(['status' => 'erro', 'message' => $e->getMessage()]);
    }
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
