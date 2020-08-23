<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Inline\Parser\BacktickParser;

class Rating extends Model
{
    protected $fillable = [ 'user_id', 'book_id', 'rating', 'review' ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
