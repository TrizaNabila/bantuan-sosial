<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('riwayat_penyaluran_bantuan', function (Blueprint $table) {
            $table->id('penyaluran_id');

            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('penerima_id');

            $table->integer('tahap_ke');
            $table->date('tanggal');
            $table->decimal('nilai', 15, 2);
            $table->string('bukti_penyaluran')->nullable();

            $table->timestamps();

            // ✅ FK ke program_bantuan.program_id
            $table->foreign('program_id')
                ->references('program_id')
                ->on('program_bantuan')
                ->onDelete('cascade');

            // FK ke penerima_bantuan.id (ini sudah benar)
            $table->foreign('penerima_id')
                ->references('id')
                ->on('penerima_bantuan')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_penyaluran_bantuan');
    }
};
