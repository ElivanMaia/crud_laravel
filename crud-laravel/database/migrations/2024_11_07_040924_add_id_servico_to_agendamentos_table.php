<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('agendamentos', function (Blueprint $table) {
        $table->unsignedBigInteger('id_servico');

        $table->foreign('id_servico')->references('id')->on('servicos')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('agendamentos', function (Blueprint $table) {
        $table->dropForeign(['id_servico']);
        $table->dropColumn('id_servico');
    });
}

};
