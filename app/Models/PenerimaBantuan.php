<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    use HasFactory;

    protected $table = 'penerima_bantuan';
    protected $primaryKey = 'penerima_id';

    protected $fillable = [
        'program_id',
        'warga_id',
        'keterangan'
    ];

    // ✅ Relasi ke program_bantuan
    public function program()
    {
        return $this->belongsTo(
            ProgramBantuan::class, // MODEL YANG BENAR
            'program_id',          // FK di tabel ini
            'program_id'           // PK di tabel program_bantuan
        );
    }

    // ✅ Relasi ke warga
    public function warga()
    {
        return $this->belongsTo(
            Warga::class,
            'warga_id',
            'warga_id'
        );
    }
}
