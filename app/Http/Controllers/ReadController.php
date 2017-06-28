<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Pinyin;

class ReadController extends Controller
{
    /**
     * 阅读主页
     */
    public function index(Request $request)
    {
        $text = '苟利国家生死以，岂因祸福避趋之';

        $formatText = str_split($text, 3);

        $pinyin = str_replace(',', ' ,', Pinyin::sentence($text, true));
        $pinyinArray = explode(' ', $pinyin);

        $results = array_combine($formatText, $pinyinArray);

        return view('read', compact('results'));
    }


    /**
     * 测试转换成汉字
     */
    public function demo(Request $request)
    {
        // 参数 $number cht/chs  两个可选
        return numToZh(10250.01, 'cht');
    }
}
