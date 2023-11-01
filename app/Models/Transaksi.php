<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory, HasUuids;


    protected $table = "transaksi";

    protected $fillable = [
        'code',
        'status',
        'user_id',
        'keberangkatan_id',
        'attachment',
        'total_price'
    ];


    public function ticket()
    {
        return $this->hasMany(Ticket::class, 'transaksi_id', 'id');
    }

    public function keberangkatan()
    {
        return $this->belongsTo(keberangkatan::class, 'keberangkatan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
}
