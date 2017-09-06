<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use softDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [];

    protected $hidden = ['password'];
}
