<?php

namespace App\Models;

use App\Models\InboundTransaction;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'nama_pemasok',
        'no_telp',
        'alamat'
    ];

    public function inboundTransactions()
    {
        return $this->hasMany(InboundTransaction::class);
    }
}
