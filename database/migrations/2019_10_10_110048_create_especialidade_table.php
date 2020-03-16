<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadeTable extends Migration
{
    public function up()
    {
        Schema::create('especialidade', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ds_especialidade');
            $table->boolean('ativo')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('especialidade');
    }
}
