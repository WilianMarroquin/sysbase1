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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Id_Cuenta');
            $table->float('Saldo_Inicial');
            $table->float('Saldo_Final');
            $table->float('Monto');
            $table->date('Fecha_Mov');
            $table->unsignedBigInteger('Id_TipoMov');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('Id_Cuenta')->references('id')->on('cuenta');
            $table->foreign('Id_TipoMov')->references('id')->on('tipo_movimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
};
