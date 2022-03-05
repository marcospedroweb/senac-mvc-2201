<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = [ 'id', 
    'nome',
    'endereco',
    'telefone',
    'email'];

    protected $table = 'Clientes';   

    public function compras()
    {
        return $this->hasMany(Vendas::class, 
                                'cliente_id',
                                'id');// 1 para muitos
        // 1 cliente pode ter varias vendas (compras), mostra quais clientes realizaram uma venda(compra)
        // [return $this->belongsTo(tabelaQueIraRetornarAlgo::class, 'propriedadeDaquelaTabela')]
        // Ira mostrar todas as compras dos clientes armazenados no [ProdutosVenda]
    }
}
