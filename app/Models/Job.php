<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $fillable = [
        'title',
        'company',
        'location',
        'job_type',
        'salary',
        'description',
        'is_active',
        'employer_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];    
    
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

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
}
