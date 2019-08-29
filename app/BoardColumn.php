<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardColumn extends Model
{
    protected $guarded = [];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
