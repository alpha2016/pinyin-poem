<?php
namespace App\Http\Controllers;

use App\Models\LearnRecord;
use Illuminate\Http\Request;
use App\Models\Poem;
use Pinyin;
use App\Services\AipSpeech;
use App\Mail\Poem as PoemMail;
use Illuminate\Support\Facades\Auth;
use function Sodium\increment;

class PoemController extends Controller
{
    /**
     * index todo 设计首页
    */
    public function index(Request $request)
    {
        $userId = Auth::check() ? Auth::user()->id : 0;

        $lastLearned = null;
        if ($userId) {
            $lastLearned = LearnRecord::where('user_id')
                ->with('poem')
                ->orderBy('updated_at', 'desc')
                ->first();
        }

        return view('index', compact('lastLearned'));
    }


    /**
     * show  todo 前端页面加上定时器js
     */
    public function show(Request $request, $id)
    {
        $poem = Poem::find($id);
        $contents = $this->formatContent($poem);

        // 访问时记录一次
       $this->record($request, $id);

        return view('poem', compact('poem', 'contents'));
    }

    /**
     * 读诗
     */
    public function speech(Request $request, $id)
    {
        $ai = new AipSpeech();
        $path = $ai->getVoice('这个是测试的', 'haha');
        return $path;
    }
    
    /**
     * 发送指定诗的邮件
     */
    public function mail(Request $request, $id)
    {
        $poem = Poem::find($id);
        $contents = $this->formatContent($poem);
        $email = Auth::user()->email;

        return \Mail::to($email)->send(new PoemMail($poem, $contents));
    }


    /**
     * 传来诗，然后处理返回规整好的内容，最后一个字符必须是 。 
     */
    public function formatContent($poem)
    {
        $contentStr = preg_replace('/\s/', '', $poem->content);
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

            $fixContentStr = trim($contentArray[$key] . $contentSeparator);
            $formatText = array_filter(str_split($fixContentStr, 3));

            // 由于可能有相同键值，无法直接使用 array_combine 合并
            $line = [];
            foreach (array_filter($formatPinyin) as $kk => $vv) {
                $line[] = [$formatText[$kk], $formatPinyin[$kk]];
            }

            $results[] = $line;
        }

        return $results;
    }


    /**
     * record 记录一下
     */
    public function record(Request $request, $id)
    {
        $userId = Auth::check() ? Auth::user()->id : 0;
        $ip = ip2long($request->ip());
        $record = ['user_id' => $userId, 'poem_id' => $id, 'created_ip' => $ip];
        $oldRecord = LearnRecord::where($record)->orderby('id', 'desc')->first();

        if ($oldRecord) {
            $oldRecord->times = $oldRecord->times + 1;
            $oldRecord->duration = $oldRecord->duration + 10;
            $oldRecord->updated_ip = $ip;
            $oldRecord->save();
        } else {
            LearnRecord::create(array_merge($record, ['created_ip' => $ip, 'updated_ip' => $ip]));
        }

        return response()->success('记录成功');
    }


    /**
     * 寻找 prev/next 诗歌
     */
    public function seek(Request $request, $id)
    {
        $this->validate($request, [
            'seek' => 'required|in:prev,next'
        ]);

        $seek = $request->input('seek');
        $type = Poem::where('id', $id)->value('poem_type_id');

        $sign = ($seek === 'next') ? '>' : '<';
        $order = ($seek === 'next') ? 'asc' : 'desc';
        $poem = Poem::where('poem_type_id', $type)->where('id', $sign, $id)->orderBy('id', $order)->first();
        $id = $poem ? $poem->id : '';

        return response()->success(['id' => $id]);
    }
}
