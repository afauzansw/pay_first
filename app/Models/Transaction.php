<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id','students_id','bills_id','amount'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
