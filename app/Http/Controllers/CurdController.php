<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurdController extends Controller
{
    /**
     * 公共查询方法
     * @param string param; example:weather:type,temp:1  即查询 weathers 表的第一条数据，同时关联 type,temp 模型
     */
    public function find(Request $request)
    {
        $param = $request->input('param');
        $paramArray = explode(':', $param);
        $handledParam = studly_case($paramArray[0]);

        // 校验是否是允许操作的控制器
        $allowedModel = ['Weather', 'WeatherType'];

        if (!in_array($handledParam, $allowedModel)) {
            return response()->error(400, '禁止执行操作');
        }

        $model = 'App\\' . $handledParam;
        $model = new $model();
        $id = $paramArray[2];
        $relations = explode(',', $paramArray[1]);


        return $model->with($relations)->findOrFail($id);
    }
}
