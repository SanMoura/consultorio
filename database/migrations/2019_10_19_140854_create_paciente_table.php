<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nm_paciente', 100);
            $table->timestamp('dt_nascimento');
            $table->string('cpf', 20);
            $table->string('rg', 20)->nullable();
            $table->string('sexo', 2);
            $table->string('email', 100)->nullable();
            $table->string('endereco', 250);
            $table->string('cidade', 100);
            $table->string('bairro', 100);
            $table->string('complemento', 250)->nullable();
            $table->string('cep', 25);
            $table->string('fone_primario', 30)->nullable();
            $table->string('fone_secundario', 30)->nullable();
            $table->longText('observacoes')->nullable();
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
        Schema::dropIfExists('paciente');
    }
}
