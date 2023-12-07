<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;


class keberangkatan extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'keberangkatan';


    protected $fillable = [
        'user_id',
        'from',
        'to',
        'bus_id',
        'date',
        'price',
        'ac',
        'kamar_mandi',
        'tv',
        'sleeper',
        'wifi',
        'charging_station',
        'bantal',
        'selimut',
        'bagasi',
        'selimut',
        'kursi_L',
        'kursi_xl',
        'kuris_xll',
        'status',
        'keberangkatan',
        'sampai'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id', 'id');
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'keberangkatan_id', 'id');
    }
    public function kursi()
    {
        return $this->hasMany(Kursi::class, 'keberangkatan_id', 'id');
    }
}
