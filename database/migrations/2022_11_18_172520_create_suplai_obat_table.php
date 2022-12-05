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
        Schema::create('suplai_obat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kode')->unique();
            $table->date('tgl');
            $table->integer('suplier_id');
            $table->integer('obat_id');
            $table->text('keterangan');
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
        Schema::dropIfExists('suplai_obat');
    }
};
