<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'picture', 'position'
    ];

    public function user() {

        return $this->belongsTo(User::class);
    }
}
