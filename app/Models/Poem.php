<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    /**
     * 诗歌的类别
     */
    public function type()
    {
        return $this->belongsTo(PoemType::class, 'poem_type_id', 'id');
    }
}
