<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    /**
     * 测试链接第二个数据库
     */
    public function connect(Request $request)
    {
        $types = DB::connection('mysql2')->select("SELECT * FROM weather_types ORDER BY id ASC LIMIT 10");
        return $types;
    }


    /**
     * php的一个高性能无限级遍历
     */
    public function testGetList(Request $request)
    {
        $start = microtime(true);
        $data = array(
            1 => array(
                'id' => 1,
                'name' => '中华人民共和国',
                'parent_id' => 0,
                'level' => 'country',
            ),
            2 => array(
                'id' => 2,
                'name' => '北京市',
                'parent_id' => 1,
                'level' => 'province',
            ),
            20 => array(
                'id' => 20,
                'name' => '天津市',
                'parent_id' => 1,
                'level' => 'province',
            ),
            38 => array(
                'id' => 38,
                'name' => '河北省',
                'parent_id' => 1,
                'level' => 'province',
            ),
            218 => array(
                'id' => 218,
                'name' => '山西省',
                'parent_id' => 1,
                'level' => 'province',
            ),
            349 => array(
                'id' => 349,
                'name' => '内蒙古自治区',
                'parent_id' => 1,
                'level' => 'province',
            ),
            465 => array(
                'id' => 465,
                'name' => '辽宁省',
                'parent_id' => 1,
                'level' => 'province',
            ),
            568 => array(
                'id' => 568,
                'name' => '保定市',
                'parent_id' => 38,
                'level' => 'city',
            ),
            569 => array(
                'id' => 569,
                'name' => '衡水市',
                'parent_id' => 38,
                'level' => 'city',
            ),
            1256 => array(
                'id' => 1256,
                'name' => '唐县',
                'parent_id' => 568,
                'level' => 'county',
            ),
            1257 => array(
                'id' => 1257,
                'name' => '望都县',
                'parent_id' => 568,
                'level' => 'county',
            ),
            9872 => array(
                'id' => 9872,
                'name' => '仁厚镇乡',
                'parent_id' => 1256,
                'level' => 'village',
            ),
            10052 => array(
                'id' => 10052,
                'name' => '下屯村',
                'parent_id' => 9872,
                'level' => 'hamlet',
            ),
        );

        $format = $this->getList($data);
        $end = microtime(true);
        // echo '执行耗时' . number_format($end - $start, 10, '.', '') . '秒<br>';
        // echo 'Now memory_get_usage: ' . memory_get_usage() . '<br />';
        return $format;
    }


    /**
     * 无限级遍历
     * 原文内容：https://wi1dcard.cn/wtf/php-fastest-create-tree-from-list/
     */
    private function getList($catList)
    {
        $treeData = [];
        foreach ($catList as &$item) {
            $parent_id = $item['parent_id'];
            if (isset($catList[$parent_id]) && !empty($catList[$parent_id])) {
                $catList[$parent_id]['list'][] = &$catList[$item['id']];
            } else {
                $treeData[] = &$catList[$item['id']];
            }
        }
        unset($item);
        return $treeData[0]['list']; // 根节点只有中华人民共和国，所以直接返回中国的所有子节点
    }
}
