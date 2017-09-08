<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poem;
use Pinyin;

class PoemController extends Controller
{
    /**
     * index 
    */
    public function index(Request $request)
    {
        // todo 
    }


    /**
     * show
     */
    public function show(Request $request, $id)
    {
        $poem = Poem::find($id);
        $contentStr = $poem->content;
        $pinyinStr = str_replace('、', ' 、',
            str_replace('?', ' ?',
                str_replace('!', ' !',
                    str_replace('.', ' .',
                        str_replace(',', ' ,', Pinyin::sentence($contentStr, true)
                        )
                    )
                )
            )
        );
        $pinyinSeparator = strpos(' !', $pinyinStr) ? ' !' : ' .';
        $pinyinArray = explode($pinyinSeparator, $pinyinStr);

        $contentSeparator = strpos('！', $contentStr) ? '！' : '。';
        $contentArray = explode($contentSeparator, $contentStr);

        // 整首诗分割之后组成成带拼音的
        $results = [];
        unset($pinyinArray[count($pinyinArray) - 1]);

        foreach ($pinyinArray as $key => $val) {
            $fixPinyinStr = trim($val . $pinyinSeparator);
            $formatPinyin = explode(' ', $fixPinyinStr);

            $fixContentStr = $contentArray[$key] . $contentSeparator;
            $formatText = str_split($fixContentStr, 3);

            // 由于可能有相同键值，无法直接使用 array_combine 合并
            $line = [];
            foreach (array_filter($formatPinyin) as $kk => $vv) {
                $line[] = [$formatText[$kk], $formatPinyin[$kk]];
            }

            $results[] = $line;
        }

        return view('poem', compact('poem', 'results'));
    }
}
