<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

}
