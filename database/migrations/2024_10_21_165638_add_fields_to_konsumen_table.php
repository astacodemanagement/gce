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
        Schema::table('konsumen', function (Blueprint $table) {
            $table->string('jenis_konsumen')->nullable()->after('status_cad');
            $table->timestamp('tanggal_approve')->nullable()->after('jenis_konsumen');
            $table->string('user_approve')->nullable()->after('tanggal_approve');
            $table->string('alasan')->nullable()->after('user_approve');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('konsumen', function (Blueprint $table) {
            //
        });
    }
};
