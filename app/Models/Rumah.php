<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    protected $table = 'rumahs';
    protected $primaryKey = 'kode_rumah';
    protected $guarded = [];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_pesanan');
    }
}
