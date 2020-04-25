<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->String('Nombre', 30)->unique();
            $table->String('Descripcion', 100)->nullable();
            $table->boolean('Estado')->default('1');
            //$table->timestamps();
        });

        DB::table('roles')->insert(array('id'=>'1', 'Nombre'=>'Administrador', 'Descripcion'=>'Control total del sistema, Contando con creacion de usuarios y de clientes'));
        DB::table('roles')->insert(array('id'=>'2', 'Nombre'=>'Vendedor', 'Descripcion'=>'Control en ciertos modulos del sistema, Contando con creacion de clientes'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
