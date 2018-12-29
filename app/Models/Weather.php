<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    /**
     * 类型
     */
    public function type()
    {
        return $this->belongsTo(WeatherType::class, 'weather_type_id');
    }


    /**
     * 一个临时测试用的关联关系，无意义
     */
    public function temp()
    {
        return $this->belongsTo(WeatherType::class, 'weather_type_id');
    }
}
