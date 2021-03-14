<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'class','year','nominal'
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'bills_id');
    }
}
