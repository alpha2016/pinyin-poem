<?php
namespace App\Http\Controllers\Admin\Poem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PoemType;

class PoemTypeController extends Controller
{
    /**
     * 诗歌类型首页
     */
    public function index(Request $request)
    {
        $types = PoemType::latest()->paginate(20);
        return view('admin.poem.types', compact('types'));
    }


    /**
     * 创建一个类型
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30'
        ]);

        $type = new PoemType;
        $type->name = htmlspecialchars($request->input('name'));

        if ($type->save()) {
            return response()->success($type);
        } else {
            return response()->error('添加失败，请重试');
        }
    }


    /**
     * 编辑一个类型
     */
    public function modify(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:30'
        ]);

        $type = PoemType::find($id);
        $type->name = htmlspecialchars($request->input('name'));

        if ($type->save()) {
            return response()->success('成功');
        } else {
            return response()->error('修改失败，请重试');
        }
    }


    /**
     * 删除一个类型
     */
    public function delete(Request $request, $id)
    {
        PoemType::destroy($id);

        return response()->success('删除成功');
    }
}
