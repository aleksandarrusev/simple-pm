<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardColumn extends Model
{
    public function board()
    {
        return $this->belongsTo(Board::class);
    }

}
