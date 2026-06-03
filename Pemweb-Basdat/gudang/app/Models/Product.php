<?php

namespace App\Models;

use App\Models\InboundTransaction;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'kode_barang',
        'nama_barang',
        'stok'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function inboundTransactions()
    {
        return $this->hasMany(InboundTransaction::class);
    }

    public function outboundTransactions()
    {
        return $this->hasMany(OutboundTransaction::class);
    }
}
