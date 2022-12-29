<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sekolah extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'desa_id',
        'name',
        'npsn',
        'alamat',
        'kode_pos',
        'status',
        'jenjang_pendidikan',
        'akreditasi',
        'kepala_sekolah',
        'tanggal_berdiri',
        'foto'
    ];
    protected $table = 'sekolah';

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
