<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
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
    return view('welcome');
});

Route::get('/avisos', function (){

    return view('avisos' , ['nome' => 'marcos',
                            'mostrar' => true, 'avisos' => [
                                                                ['id' => 1, 'aviso' => 'Mussum Ipsum, cacilds vidis litro abertis. Suco de cevadiss deixa as pessoas mais interessantis.Quem num gosta di mim que vai caçá sua turmis!Delegadis gente finis, bibendum egestas augue arcu ut est.Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.'],
                                                                ['id' => 2, 'aviso' => 'Mussum Ipsum, cacilds vidis litro abertis. Quem num gosta di mé, boa gentis num é.Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis!Todo mundo vê os porris que eu tomo, mas ninguém vê os tombis que eu levo!Pra lá , depois divoltis porris, paradis.'],
                                                                ['id' => 3, 'aviso' => 'Mussum Ipsum, cacilds vidis litro abertis. Todo mundo vê os porris que eu tomo, mas ninguém vê os tombis que eu levo!In elementis mé pra quem é amistosis quis leo.Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis.Mé faiz elementum girarzis, nisi eros vermeio.']
                                                            ]]); //Passando variaveis get para a pagina
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::prefix('clientes')->group( function(){

    Route::get('/teste', function (){
        return view('clientes', ['erro' => true]);
    });

    Route::get('/listar', [ClientesController::class, 'listar'])->middleware('auth')->name('clientes.listar');
    // [middleware('auth')] Vai verificar se o usuario esta logado, se não tive logado ele não tem acesso a pagina e retorna para a pagina de login
});
