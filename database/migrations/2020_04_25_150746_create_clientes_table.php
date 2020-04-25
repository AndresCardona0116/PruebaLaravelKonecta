<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->String('Nombre', 100);
            $table->String('Tipo_Documento', 20);
            $table->String('Num_Documento', 20)->Unique();
            $table->String('Direccion', 70)->nulleable();
            $table->String('Telefono', 20);
            $table->String('Email', 50)->nulleable();
            $table->boolean('Estado', 1)->default(1);
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
        Schema::dropIfExists('clientes');
    }
}
