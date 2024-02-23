<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $table = 'pembelis';
    protected $primaryKey = 'nik';
    protected $guarded = [];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_pesanan');
    }
}
