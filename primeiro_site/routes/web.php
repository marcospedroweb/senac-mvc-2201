<?php

use Illuminate\Support\Facades\Route;

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
    return view('avisos',[  'nome' => 'Albertin', 
                            'mostrar' => true,
                            'avisos' => [   ['id' => 1, 'aviso' => 'Mussum Ipsum, cacilds vidis litro abertis'],
                                            ['id' => 2, 'aviso' => 'Em pé sem cair, deitado sem dormir'],
                                            ['id' => 3, 'aviso' => 'A ordem dos tratores não altera o pão duris']]]);
});