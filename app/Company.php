<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug', 'active', 'feedback_duration_id'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function feedbackDuration()
    {
        return $this->belongsTo(FeedbackDuration::class);
    }

    public function members()
    {
        return $this->hasMany(User::class);
    }

    // without admin and with active status
    public function users()
    {
        $users = $this->members()->with('profile.jobTitle')
            ->where('company_id', $this->id)
            ->where('active', true)
            ->get();

        return $users->filter(function ($user) {
            return !$user->hasRole('admin');
        });
    }
}
