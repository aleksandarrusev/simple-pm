<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::created(function (Sprint $model) {
            $board = Board::create([
                'project_id' => $model->getAttribute('project_id'),
                'sprint_id' => $model->id,
            ]);

            $model['board_id'] = $board->id;
            $model->save();
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

}
