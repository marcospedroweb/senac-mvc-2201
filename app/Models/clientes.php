<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;

    //[Criando uma model] php artisan make:model [nome]
    //define colunas
    protected $fillable = ['id',
                            'nome',
                            'endereco',
                            'telefone',
                            'email'];
    //Protected permite que a classe quando "extendida", o proximo pode alterar

    //Define a tabela
    protected $table = 'Clientes';
    //[Criando uma nova migration] php artisan make:migration [nome do arquivo] --create-[nome]
}
