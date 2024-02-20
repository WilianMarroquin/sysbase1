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
        Schema::create('cuenta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Id_Cliente');
            $table->float('Saldo' , 8, 2);
            $table->date('Fecha_Apertura');
            $table->unsignedBigInteger('tipo_cuenta_id');
            $table->enum('Estado' , ['Activo', 'Inactivo']);
            $table->unsignedBigInteger('moneda_id',);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('Id_Cliente')->references('id')->on('cliente');
            $table->foreign('tipo_cuenta_id')->references('id')->on('tipo_cuenta');
            $table->foreign('moneda_id')->references('id')->on('tipo_moneda');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuenta');
    }
};
