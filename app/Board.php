<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function boardColumns()
    {
        return $this->hasMany(BoardColumn::class);
    }
}
