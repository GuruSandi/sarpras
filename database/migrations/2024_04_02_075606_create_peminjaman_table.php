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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->foreignId('sarpras_id')->constrained()->onDelete('restrict');
            $table->datetime('tanggal_pinjam')->nullable();
            $table->enum('status',['dipinjam','kembali'])->nullable();
            $table->datetime('tanggal_kembali')->nullable();
            $table->text('kondisi_pinjam')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('peminjam')->nullable();
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
        Schema::dropIfExists('peminjaman');
    }
};
