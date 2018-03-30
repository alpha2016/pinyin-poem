<?php
namespace App\Http\Controllers\Admin\Poem;

use App\Models\Poem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AipSpeech;
use \App\Models\PoemType;
use Illuminate\Support\Facades\Auth;

class PoemController extends Controller
{
    /**
     * 诗集列表页
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $poems = Poem::with('type')->paginate(20);
        return view('admin.poem.poems', compact('poems'));
    }


    /**
     * 展示添加诗歌页面
     */
    public function showCreate(Request $request)
    {
        $types = PoemType::all();
        return view('admin.poem.create-poem', compact('types'));
    }


    /**
     * 新增诗歌并生成语音文件
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'poem_type_id' => 'required|exists:poem_types,id',
            'author' => 'required|max:20',
            'content' => 'required|max:1000',
            'description' => 'required|max:250',
            'picture' => 'required|max:150'
        ]);

        $poem = new Poem;
        $poem->poem_type_id = intval($request->input('poem_type_id'));
        $poem->author = htmlspecialchars($request->input('author'));
        $poem->title = htmlspecialchars($request->input('title'));
        $poem->content = htmlspecialchars($request->input('content'));
        $poem->description = htmlspecialchars($request->input('description'));
        $poem->picture = htmlspecialchars($request->input('picture'));
        $poem->admin_id = Auth::guard('admin')->user()->id;
        $result = $poem->save();

        if ($result) {
            $ai = new AipSpeech();
            $ai->getVoice($request->input('content'), $request->input('title') . '-female');
            return redirect('/admin/poems');;
        } else {
            return response()->error('添加失败，请重试');
        }
    }


    /**
     * 编辑
     */
    public function modify(Request $request, $id)
    {

    }


    /**
     * 删除
     */
    public function delete(Request $request, $id)
    {
        Poem::destroy($id);

        return response()->success('成功');
    }
}
