<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public function borrowRecords()
    {
        return $this->hasMany(BorrowRecord::class);
    }

    protected $fillable = [
        'title',
        'author',
        'price',
        'image',
        'category'
    ];





}
