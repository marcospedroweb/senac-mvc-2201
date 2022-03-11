<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendas extends Model
{
    use HasFactory;

    // Colunas que devem ser preenchidas
    protected $fillable = [
        'id',
        'cliente_id',
        'vendedor_id',
        'data_da_venda',];

    //Nome da tabela
    protected $table = 'Vendas';

    //Criando a tabela com migration
    //php artisan make:migration [nome da migration] --create [nome tabela]
}
