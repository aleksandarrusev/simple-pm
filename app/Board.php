<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::created(function (Board $model) {
            $boardColumn = new BoardColumn();
            $model->createDefaultColumns();
        });
    }

    public function boardColumns()
    {
        return $this->hasMany(BoardColumn::class);
    }

    public function sprint() {
        return $this->hasOne(Sprint::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function createDefaultColumns()
    {
        $this->boardColumns()->createMany([
            array(
                'name' => 'Todo',
                'board_id' => $this->id,
            ),
            array(
                'name' => 'In Progress',
                'board_id' => $this->id,
            ),
            array(
                'name' => 'Done',
                'board_id' => $this->id,
            )
        ]);
    }
}
