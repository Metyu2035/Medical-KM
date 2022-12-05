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
        Schema::create('obat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kode_obat',5)->unique();
            $table->string('nama_obat',45);
            $table->integer('kategori_obat_id');
            $table->string('penyimpanan',45);
            $table->integer('stock');
            $table->string('unit',45);
            $table->date('kadaluarsa');
            $table->float('harga_obat');
            $table->text('keterangan');
            $table->text('foto');
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
        Schema::dropIfExists('obat');
    }
};
