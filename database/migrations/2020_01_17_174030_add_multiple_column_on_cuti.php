<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnOnCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cutis', function (Blueprint $table) {
            $table->string('tgl_awal')->after('user_id');
            $table->string('tgl_selesai')->nullable()->after('tgl_awal');
            $table->string('notes')->nullable()->after('tgl_selesai');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cutis', function (Blueprint $table) {
            $table->dropColumn(['tgl_awal','tgl_selesai','notes']);
        });
    }
}
