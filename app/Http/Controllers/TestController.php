<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * 生成随机位图
     */
    public function rand(Request $request)
    {
        $im = imagecreatetruecolor(512, 512)
            or die("Cannot Initialize new GD image stream");
        $white = imagecolorallocate($im, 255, 255, 255);
        for ($y=0; $y<512; $y++) {
            for ($x=0; $x<512; $x++) {
                // random_int() 为 php7+ 的函数，mt_rand() 在 windows 上的表现比 rand() 好很多
                if (random_int(0,1) === 1) {
                    imagesetpixel($im, $x, $y, $white);
                }
            }
        }
        ob_start();
        imagepng($im);
        $content = ob_get_contents();
        imagedestroy($im);
        ob_end_clean();
        return $response = \Response::make($content)->header('Content-Type', 'image/png');
    }


    /**
     * 字符串翻转，同时保持同位置大小写一致
     */
    public function reverse(Request $request) {
        var_dump(reverse('Ant-+*/deSign'));
        var_dump(reverse('Hellp PHPtest'));
        var_dump(reverse('Boston Celtics!A'));
    }

    /**
     * 敏感词过滤
     */
    public function wordCheck(Request $request)
    {
        $content = '他是个傻@B bitchSADF啊，傻xx逼! é-f-é-u-é-c-é-k-é?';

        return sensitiveWordFilter($content);
    }
}
