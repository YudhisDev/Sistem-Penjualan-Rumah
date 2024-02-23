<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    use HasFactory;

    protected $table = 'kredits';
    protected $primaryKey = 'kode_kredit';
    protected $guarded = [];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'kode_invoice');
    }
}
