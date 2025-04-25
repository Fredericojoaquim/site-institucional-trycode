<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function fetchData(Request $request)
    {
        // Configuração da API
        $apiHost = "https://adva-prod-ohi.oracleindustry.com/prod/claims/api/generic/claims/search";

        // Credenciais de autenticação
        $credentials = [
            'username' => 'fbjm@adv-angola.com',
            'password' => '1998AgostoAngola',
        ];

        // Fazer a requisição de autenticação (se necessário)
       

        $authResponse = Http::withOptions(['verify' => false])->asForm()->post('https://idcs-7d4260755fda42d1bd9606e8fc6ebd07.identity.oraclecloud.com/oauth2/v1/token/', [
            'grant_type' => 'password',
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'client_id' => config('api.client_id'),
            'client_secret' => config('api.client_secret'),
        ]);
        

        // Verifica se obteve o token com sucesso
        if ($authResponse->failed()) {
            return response()->json(['error' => 'Failed to obtain access token'], 401);
        }

        $accessToken = $authResponse->json()['access_token'];

        // Corpo da requisição para a API
        $body = [
            "resource" => [
                "limit" => "200",
                "offset" => "0",
                "orderBy" => "creationDate:asc",
                "totalResults" => true,
                "q" => "processType.eq('R').and.entryDate.gte(2024-01-01)"
            ],
            "resourceRepresentation" => [
                "fields" => "code|externalUserNameAdv|claimDiagnosisList.diagnosis.code|claimDiagnosisList.diagnosis.descr|status|EXTERNAL_CANCELLATION_USER_ADV|code_1",
                "defaultoverride" => true,
                "expand" => ""
            ]
        ];

        // Fazer a requisição à API com o token de acesso
        $response = Http::withToken($accessToken)->post($apiHost, $body);

        // Retorna a resposta da API
        if ($response->failed()) {
            return response()->json(['error' => 'API request failed', 'details' => $response->json()], 500);
        }

       dd(response()->json($response->json(), $response->status()));
    }
}
