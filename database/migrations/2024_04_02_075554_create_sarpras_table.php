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
            $table->foreignId('kategori_id')->constrained()->nullable()->onDelete('cascade');
            $table->string('kode_sarpras');
            $table->text('nama_sarpras');
            $table->text('merk_barang')->nullable();
            $table->text('spesifikasi_barang')->nullable();
            $table->text('kondisi_barang')->nullable();
            $table->enum('status',['aktif','tidak'])->nullable();
            $table->string('foto');
            $table->integer('stok')->nullable();
            $table->enum('jenis_sarpras',['sarana','prasarana']);
            // $table->text('penerima_barang')->nullable();
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
