<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoSolicitacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_solicitacao', function (Blueprint $table) {
            $ESTADO = ['aberto', 'encerrado', 'arquivado'];

            $table->foreignId('solicitacao_id')->constrained('solicitacoes')->references('solicitacao_id');
            $table->enum('estado', $ESTADO);
            $table->date('data_inicio');
            $table->date('data_resposta')->nullable();
            $table->date('data_fecho_previsto')->nullable();
            $table->date('data_encerramento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_solicitacao');
    }
}
