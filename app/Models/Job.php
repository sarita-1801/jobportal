<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // Users who saved this job
    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_jobs', 'job_id', 'user_id');
    }

    // Applications for this job
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
