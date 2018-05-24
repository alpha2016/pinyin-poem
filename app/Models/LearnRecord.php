<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearnRecord extends Model
{
    protected $fillable = ['user_id', 'poem_id', 'times', 'duration', 'created_ip', 'updated_ip'];
}
