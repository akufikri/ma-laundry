<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->id();
            $table->enum('pake_kuota', ['PAKET SETRIKA', 'PAKET LAUNDRY', 'PAKET SABUN']);
            $table->string('berat');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->unsignedBigInteger('satuan_id');
            $table->integer('harga');
            $table->string('cabang');
             $table->foreign('satuan_id')->references('id')->on('satuans');
             $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket');
    }
};