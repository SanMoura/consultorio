<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoAtendimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_atendimento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('documento_id');
            $table->integer('atendimento_id');
            $table->string('nm_campo', 100);
            $table->longText('valor_campo');
            $table->timestamp('dt_documento');
            $table->boolean('situacao')->comment('0 - ABERTO, 1 - FECHADO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento_atendimento');
    }
}
