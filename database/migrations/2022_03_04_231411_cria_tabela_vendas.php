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
        Schema::create('Vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')
                    ->references('id')
                    ->on('Clientes')
                    ->onDelete('cascade');//Transforma esse id em foreign key para outra tabela
            $table->bigInteger('vendedor_id')->unsigned();
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
        Schema::dropIfExists('Vendas');
    }
};
