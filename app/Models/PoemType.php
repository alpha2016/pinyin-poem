<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoemType extends Model
{
    use SoftDeletes;

    private $date = ['deleted_at'];
}
