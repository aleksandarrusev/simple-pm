<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assignee()
    {
        return $this->belongsTo(User::class);
    }

    public function column()
    {
        return $this->belongsTo(BoardColumn::class);
    }

    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }

}
