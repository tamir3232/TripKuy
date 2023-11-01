<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = "ticket";

    protected $fillable = [
        'code',
        'status',
        'penumpang_id',
        'transaksi_id',
    ];
    public function penumpang()
    {
        return $this->belongsTo(Penumpang::class, 'penumpang_id', 'id');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
}
