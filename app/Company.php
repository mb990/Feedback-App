<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug', 'active', 'feedback_time'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function members()
    {
        return $this->hasMany(User::class);
    }

    public function users()
    {
        $users = $this->members()->where();

      foreach ($users as $member) {

//          if ($member->hasRole('admin')) {

              $users->reject($member);
//          }
      }

      return $users;
    }
}
