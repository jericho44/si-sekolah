<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];
    protected $table = 'kecamatan';

    public function desa()
    {
        return $this->hasMany(Desa::class);
    }
}
