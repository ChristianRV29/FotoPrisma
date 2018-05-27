<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUsuarioUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario', function (Blueprint $table) {
            // $table->dropColumn('Correo');
            // $table->dropColumn('Clave');

            //$table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario', function (Blueprint $table) {
            // $table->string('Correo');
            // $table->string('Clave');

            $table->dropForeign('user_auth_id');
            $table->dropColumn('user_auth_id');
        });
    }
}
