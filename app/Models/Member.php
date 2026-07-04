<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    public function borrowRecords()
    {
        return $this->hasMany(BorrowRecord::class);
    }
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'photo'
    ];
}

