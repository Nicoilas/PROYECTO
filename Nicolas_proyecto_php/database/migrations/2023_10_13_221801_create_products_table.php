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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->integer('id_marca');
            $table->string('descripcion');
            $table->enum('unidad_medida',['UNIDAD','OTRO']);
            $table->tinyInteger('disponible');
            $table->decimal('porcentaje_iva',$precision =4, $scale=2);
            $table->decimal('precio_unitario',$precision =20, $scale=2);
            $table->SmallInteger('stock');
            $table->foreignId('id_categoria')->constrained('categorias')->onDalate('cascade');
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
        Schema::dropIfExists('products');
    }
};
