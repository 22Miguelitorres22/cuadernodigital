<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicados', function (Blueprint $table) {
            // id; PK; auto_increment
            $table->id();

            // texto del comunicado
            $table->text('contenido');

            // Relación con user (creador)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Relación con user (destinatario)
            // $table->index('destination_user_id');
            $table->bigInteger('destination_user_id')->unsigned();
            // $table->index('destination_user_id');
            $table->foreign('destination_user_id')->references('id')->on('users')->onDelete('cascade');

            // created_at, updated_at
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
        Schema::dropIfExists('comunicados');
    }
}
