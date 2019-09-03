<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = [];

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
                'order' => 1
            ),
            array(
                'name' => 'In Progress',
                'board_id' => $this->id,
                'order' => 2
            ),
            array(
                'name' => 'Done',
                'board_id' => $this->id,
                'order' => 3
            )
        ]);
    }
}
