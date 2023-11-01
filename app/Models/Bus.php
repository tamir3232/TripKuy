<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'bus';

    protected $fillable = [
        'id',
        'name',
        'username',
        'email',
        'password',
        'alamat',
        'role',
    ];

    public function keberangkatan()
    {
        return $this->hasMany(keberangkatan::class, 'keberangkatan_id', 'id');
    }
}
