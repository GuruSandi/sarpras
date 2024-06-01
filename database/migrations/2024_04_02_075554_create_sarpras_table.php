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
        Schema::create('sarpras', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sarpras');
            $table->string('nama_sarpras');
            $table->enum('status',['aktif','tidak']);
            $table->string('foto');
            $table->integer('stok');
            $table->enum('jenis_sarpras',['sarana','prasarana']);
            $table->text('penerima_barang');
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
        Schema::dropIfExists('sarpras');
    }
};
