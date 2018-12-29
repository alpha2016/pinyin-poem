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
        
        $instantiatedModel = $this->handleModel($paramArray);
        $id = $paramArray[2];
        $relations = explode(',', $paramArray[1]);

        return $instantiatedModel->with($relations)->findOrFail($id);
    }


    /**
     * 公用删除方法
     * @param string param; example:weather:1,2,3 ..  即删除 Weather 中的 id 为 1,2,3 的数据
     */
    public function delete(Request $request)
    {
        $param = $request->input('param');
        $paramArray = explode(':', $param);
        $instantiatedModel = $this->handleModel($paramArray);
        $ids = $paramArray[1];

        if (is_integer($ids) || is_string($ids)) {
            $ids = explode(',', $ids);
        }

        if ($instantiatedModel->destroy($ids) !== false) {
            return 1;
        } else {
            return 0;
        }
    }


    /**
     * 公用校验和实例化模型的方法
     * @param array $paramArray 处理之后的参数数组
     */
    private function handleModel($paramArray)
    {
        $model = studly_case($paramArray[0]);
        // 校验是否是允许操作的控制器
        $allowedModel = ['Weather', 'WeatherType'];
        if (!in_array($model, $allowedModel)) {
            return response()->error(400, '禁止执行操作');
        }

        $modelWithPath = 'App\Models\\' . $model;
        return new $modelWithPath();
    }
}
