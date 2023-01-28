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
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('barang_id');
            $table->string('tempat');
            $table->date('tanggal_peminjaman');
            $table->boolean('status_pengembalian')->default(0);
            $table->integer('jumlah_pinjaman');
            $table->date('tanggal_pengembalian')->nullable();
            $table->boolean('status_peminjaman')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('barang_id')->references('id')->on('barangs');
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
        Schema::dropIfExists('pinjamen');
    }
};
