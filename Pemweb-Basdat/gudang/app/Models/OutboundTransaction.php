<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutboundTransaction extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'jumlah_keluar',
        'tanggal_keluar',
        'keterangan_tujuan'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
