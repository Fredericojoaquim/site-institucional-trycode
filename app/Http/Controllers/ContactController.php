<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    

    public function send(Request $request)
    {
       
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'telefone'=>'required|string',
            'mensagem' => 'required|string',
           
        ]);

        try {
            Mail::to('geral@trycode-angola.com')->send(new ContactMessage($data));
        
            return back()->with('success', 'Mensagem enviada com sucesso!');

        } catch (\Exception $e) {
            Log::error('Erro ao enviar e-mail: ' . $e->getMessage());
        
            return back()->with('error', 'Ocorreu um erro ao enviar a mensagem. Tente novamente mais tarde.');
        }

      

      //  return back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
