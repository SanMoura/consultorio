<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('paciente');
            $table->timestamp('dt_hr_atendimento');
            $table->date('dt_atendimento');
            $table->bigInteger('user_id_medico')->unsigned();
            $table->foreign('user_id_medico')->references('id')->on('users');
            $table->string('carteira')->nullable();
            $table->bigInteger('convenio_id')->unsigned();
            $table->foreign('convenio_id')->references('id')->on('convenio');
            $table->string('ds_plano')->nullable();
            $table->timestamp('dt_alta')->nullable();
            $table->string('hora_agendamento');
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
        Schema::dropIfExists('atendimento');
    }
}
