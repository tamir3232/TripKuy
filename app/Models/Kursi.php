<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'kursi';

    protected $fillable = [
        'nama',
        'penumpang_id',
        'keberangkatan_id',
    ];


    public function penumpang()
    {
        return $this->belongsTo(Penumpang::class, 'penumpang_id', 'id');
    }
    public function keberangkatan()
    {
        return $this->belongsTo(keberangkatan::class, 'keberangkatan_id', 'id');
    }
}
