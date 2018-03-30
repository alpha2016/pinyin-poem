<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poem extends Model
{
    use SoftDeletes;

    protected $fillable = ['poem_type_id', 'author', 'title', 'content', 'description', 'admin_id',
        'picture'];

    protected $dates = ['deleted_at'];

    /**
     * 诗歌的类别
     */
    public function type()
    {
        return $this->belongsTo(PoemType::class, 'poem_type_id', 'id');
    }
}
