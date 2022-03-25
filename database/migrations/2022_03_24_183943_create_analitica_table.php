<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaliticaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analitica', function (Blueprint $table) {
            $TIPO_SOLICITACAO = ['aconselhamento', 'orientacao', 'informacao', 'mediacao', 'outro'];
            $TIPO_APRESENTACAO = ['individual', 'coletiva'];
            $FORMA_CONTACTO = ['email', 'correio_postal', 'formulario', 'presencial', 'telefone', 'outra'];
            $NATUREZA = ['academico_administrativa', 'acao_social', 'pedagogica', 'diversos', 'outra'];

            $table->foreignId('solicitacao_id')->constrained('solicitacoes')->references('solicitacao_id');
            $table->enum('tipo_solicitacao', $TIPO_SOLICITACAO);
            $table->enum('apresentacao', $TIPO_APRESENTACAO);
            $table->enum('forma_contacto', $FORMA_CONTACTO);
            $table->enum('natureza', $NATUREZA);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analitica');
    }
}
