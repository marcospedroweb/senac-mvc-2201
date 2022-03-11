<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');//Transforma esse id em foreign key para outra tabela
            $table->bigInteger('vendedor_id')->unsigned();
            $table->foreign('vendedor_id')->references('id')->on('vendedores')->onDelete('cascade');//Transforma esse id em foreign key para outra tabela
            $table->date('data_da_venda');
            $table->timestamps();
            //[executa as migrações] php artisan migrate
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
};
