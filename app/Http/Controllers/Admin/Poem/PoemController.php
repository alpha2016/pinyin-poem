<?php
namespace App\Http\Controllers\Admin\Poem;

use App\Models\Poem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
