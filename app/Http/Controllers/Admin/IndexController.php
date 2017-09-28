<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 后台主页
     */
    public function index(Request $request) 
    {
        return view('admin.index');
    }

    /**
     * 测试
     */
    public function test(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'content' => 'required|max:120'
        ]);
    }
}
