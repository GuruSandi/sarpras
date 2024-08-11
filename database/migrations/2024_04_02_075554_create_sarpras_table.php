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
            $table->foreignId('kategori_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('kode_sarpras');
            $table->text('nama_sarpras');
            $table->text('merk_barang')->nullable();
            $table->text('spesifikasi_barang')->nullable();
            $table->text('kondisi_barang')->nullable();
            $table->enum('status',['aktif','tidak','diperbaiki'])->nullable();
            $table->string('foto')->nullable();
            $table->integer('stok')->nullable();
            $table->enum('jenis_sarpras',['sarana','prasarana']);
            $table->enum('jenis_prasarana',['gedung','laboratorium','perpustakaan','saranaolahraga'])->nullable();
            $table->decimal('luas_bangunan', 10, 2)->nullable();
            $table->text('tahun_pembangunan')->nullable();
            $table->text('status_kepemilikan')->nullable();
            $table->text('sumber_dana')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('jumlahruang')->nullable();
            $table->integer('jumlah_ruang_kelas')->nullable();
            $table->text('kapasitas_ruang')->nullable();
            $table->text('fasilitas')->nullable();
            $table->text('fasilitasruang')->nullable();
            $table->text('sanitasi')->nullable();
            $table->text('jenis_laboratorium')->nullable();
            $table->text('jenis_ruangan')->nullable();
            $table->text('peralatan_tersedia')->nullable();
            $table->text('jenis_koleksi')->nullable();
            $table->decimal('luas_ruang', 10, 2)->nullable();
            $table->text('ukuran_lapangan')->nullable();
            $table->text('kondisi_lapangan')->nullable();
            $table->text('fungsi_prasarana')->nullable();
            $table->text('kapasitas_penggunaan')->nullable();
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
