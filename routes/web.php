<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacoteController;
use App\Http\Controllers\DomainNameController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DominioController;
use App\Models\Pacote;
use App\Models\Dominio;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $pacotes=Pacote::all();
    $dominios=Dominio::all();
    return view('welcome',['pacotes'=>$pacotes,'dominios'=>$dominios]);
});

Route::get('/sobre', function () {
    $pacotes=Pacote::all();
    return view('home.sobre',['pacotes'=>$pacotes]);
});

Route::get('/Carrinho', function () {
    $pacotes=Pacote::all();
    return view('home.carrinho',['pacotes'=>$pacotes]);
});

Route::get('/contacto', function () {
    $pacotes=Pacote::all();
    return view('home.contacto',['pacotes'=>$pacotes]);
});

Route::get('/servicos', function () {
    $pacotes=Pacote::all();
    return view('home.servico',['pacotes'=>$pacotes]);
});

Route::get('/dominios', function () {
    $dominios=Dominio::all();
    $pacotes=Pacote::all();
    return view('home.dominio',['pacotes'=>$pacotes,'dominios'=>$dominios]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', function () {
    return view('index');
});

Route::post('/trycode/verificar-dominio', [DomainNameController::class, 'verificarDominio'])->name('dominos.verificar');
Route::post('/contacto/enviar-mensagem', [ContactController::class, 'send'])->name('contact.send');


Route::middleware(['auth', 'check.session'])->group(function () {
  
//Usuarios
Route::get('/teste', [ApiController::class,'fetchData'])->name('teste');
Route::get('/admin/usuario/registar', [UserController::class,'create'])->name('usuario.create');
Route::Post('/admin/usuario/salvar', [UserController::class,'store'])->name('usuario.salvar');
Route::get('/admin/usuario/listar', [UserController::class,'index'])->name('usuario.listar');
//Pacotes
Route::get('/admin/pacote/registar', [PacoteController::class,'create'])->name('pacote.create');
Route::post('/admin/pacote/salvar', [PacoteController::class,'store'])->name('pacote.salvar');
Route::get('/admin/pacote/listar', [PacoteController::class,'index'])->name('pacote.listar');
Route::get('/admin/pacote/editar/{id}', [PacoteController::class,'edit'])->name('pacote.editar');
Route::put('/admin/pacote/alterar', [PacoteController::class,'update'])->name('pacote.alterar');

//dominio
Route::get('/admin/dominio/registar', [DominioController::class,'create'])->name('dominio.create');
Route::Post('/admin/dominio/salvar', [DominioController::class,'store'])->name('dominio.salvar');
Route::get('/admin/dominio/listar', [DominioController::class,'index'])->name('dominio.listar');
Route::get('/admin/dominio/edit/{id}', [DominioController::class,'edit'])->name('dominio.edit');
Route::Post('/admin/dominio/update', [DominioController::class,'update'])->name('dominio.alterar');






});




require __DIR__.'/auth.php';
