<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'picture', 'position', 'company_id'
    ];

    public function user() {

        return $this->hasOne(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
