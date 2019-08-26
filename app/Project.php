<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function projectManager()
    {
        return $this->hasOne(User::class);
    }

    public function sprint()
    {
        return $this->hasMany(Sprint::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
