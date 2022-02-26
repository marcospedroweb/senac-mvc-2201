<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendedores extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome'];
        //Colunas a ser preenchidas

    //Nome da tabela
    protected $table = 'Vendedores';
}
