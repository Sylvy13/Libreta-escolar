<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_actividad');
            $table->bigInteger('id_acudiente');
            $table->string('usuario');
            $table->longText('descripcion')->nullable();
            $table->string('curso');
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->float('calificacion')->nullable();
            
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
        Schema::dropIfExists('entregas');
    }
}
