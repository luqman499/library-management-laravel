<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowRecord extends Model
{
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    protected $fillable = [
        'book_id',
        'member_id',
        'borrow_id',
        'return_date'
    ];


}

