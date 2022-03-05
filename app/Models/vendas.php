<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = [ 'id',
                            'cliente_id',
                            'vendedor_id',
                            'data_da_venda' ];
    protected $table = 'Vendas';

    public function cliente(){
        return $this->belongsTo(Clientes::class, 
                                            'cliente_id', // coluna nesta model
                                            'id'); // se relaciona com a coluna da model [Cliente]
                                            // Semelhante a ON vendas.cliente_id = cliente.id
        // 1 para muitos, inverso
        // 1 cliente pode ter varias vendas (compras), mostra os clientes que realizaram aquela venda(compra)
        // [return $this->belongsTo(tabelaQueIraRetornarAlgo::class, 'propriedadeDaquelaTabela')]
    }

    public function produtos(){
        return $this->hasMany(ProdutosVenda::class,
                                        'venda_id', // coluna nesta model
                                        'id'); // se relaciona com a coluna da model [ProdutosVenda]
                                        // Semelhante a ON vendas.venda_id = ProdutosVenda.id
        // 1 para muitos
        // 1 venda pode ter varios produtos, mostra qual produto foi vendido naquela venda
        // [return $this->belongsTo(tabelaQueIraRetornarAlgo::class, 'propriedadeDaquelaTabela')]
    }

    public function notaFiscal(){
        return $this->hasOne(NotasFiscais::class,
                                        'venda_id',
                                        'id');  
        // 1 para 1
        // 1 venda tem 1 nota fiscal, mostra a nota fiscal daquela venda
    }
}
