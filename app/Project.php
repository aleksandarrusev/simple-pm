<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::created(function (Project $model) {
            if ($model->isKanban()) {
                Board::create([
                    'project_id' => $model->id,
                ]);
            }
        });
    }


    public function isKanban()
    {
        return $this->type === 'Kanban';
    }

    public function projectManager()
    {
        return $this->hasOne(User::class);
    }

    public function sprints()
    {
        return $this->hasMany(Sprint::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function board()
    {
        return $this->hasOne(Board::class);
    }
}
