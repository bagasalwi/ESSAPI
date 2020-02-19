<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnOnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('nik')->after('password');
            $table->string('telepon')->after('nik');
            $table->string('alamat')->after('telepon');
            $table->string('posisi')->after('alamat');
            $table->string('divisi')->after('posisi');
            $table->string('status')->after('divisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nik','telepon','alamat','posisi','divisi','status']);
        });
    }
}
