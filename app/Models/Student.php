<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn','name','class','major','address', 'bills_id'
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class,'students_id');
    }
}
