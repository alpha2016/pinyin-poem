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
        $types = PoemType::paginate(20);
        return view('admin.poem.types', compact('types'));
    }




    /**
     * 删除一个类型
     */
    public function delete(Request $request, $id)
    {
        PoemType::destroy($id);

        return 'success';
    }
}
