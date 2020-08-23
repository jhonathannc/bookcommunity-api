<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    protected $fillable = [ 'user_id', 'token', 'type', 'expires_at' ];

    public $timestamps = false;

    protected $hidden = [ 'id', 'user_id', 'token', 'type', 'expires_at' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
