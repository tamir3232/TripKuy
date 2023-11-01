<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    use HasFactory, HasUuids;


    protected $table = 'penumpang';

    protected $fillable = [
        'name',
        'alamat',
        'no_wa',
        'email',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class, 'penumpang_id', 'id');
    }
}
