<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penerima_bantuan', function (Blueprint $table) {
            $table->id('penerima_id'); // PK

            $table->unsignedBigInteger('program_id'); // FK ke program_bantuan
            $table->unsignedBigInteger('warga_id');   // FK ke warga

            $table->string('keterangan')->nullable();
            $table->timestamps();

            // Foreign Key ke program_bantuan
            $table->foreign('program_id')
                  ->references('program_id')
                  ->on('program_bantuan')
                  ->onDelete('cascade');

            // Foreign Key ke warga
            $table->foreign('warga_id')
                  ->references('warga_id')
                  ->on('warga')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penerima_bantuan');
    }
};
