<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Sluggable, hasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'active', 'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name']
            ]
        ];
    }

    public function profile() {

        return $this->hasOne(Profile::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'creator_id');
    }

    public function didFeedBackOnTeammate($id) {

        return $this->feedbacks()->where('target_user_id', $id)
            ->latest()
            ->first();
    }

    public function hasFeedback($id, $score)
    {
        return $this->feedbacks()->where('creator_id', $id)
            ->whereHas('skills', function ($q) use ($score) {
                $q->where('score', $score);
            })
            ->latest()
            ->first();
    }
}
