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
    Schema::table('absens', function (Blueprint $table) {
        $table->dropForeign(['karyawan_id']);
        $table->foreign('karyawan_id')
            ->references('id')
            ->on('karyawans')
            ->onDelete('cascade'); // Menambahkan onDelete cascade ke foreign key
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('absens', function (Blueprint $table) {
            $table->dropForeign(['karyawan_id']);
        });
    }
    
};
