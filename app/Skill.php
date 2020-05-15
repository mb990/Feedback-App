<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function feedbacks()
    {
        return $this->belongsToMany(Feedback::class, 'feedback_skill')
            ->withPivot('score')
            ->withTimestamps();
    }
}
