<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';
    protected $primaryKey = 'id_pesanan';
    protected $guarded = [];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'nik');
    }
    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'kode_rumah');
    }
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'kode_invoice');
    }
}
