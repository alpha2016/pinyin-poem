<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use QrCode;
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    /**
     * 操作
     */
    public function index(Request $request)
    {
        $baseImage = Image::make('./assets/images/base.jpg');

        // 生成二维码
        QrCode::format('png')->size(200)->merge('./public/assets/images/jxh05.gif')
            ->generate('http://wwww.baidu.com', storage_path('/temp/qr.png'));
        $path = storage_path('/temp/qr.png');
        // $baseImage->insert('./assets/images/jxh05.gif', 'bottom', 150, 150);

        $baseImage->insert($path, 'bottom', 150, 150);
        $baseImage->text('图样图森破', 500, 250, function($font) {
            $font->file(public_path('./assets/fonts/FZCuJinLJW.ttf'));
            // $font->file(5);
            $font->size(56);
            $font->color('#1c4587');
            $font->align('center');
            $font->valign('top');
            //$font->angle(45);
        });

        return $baseImage->response('jpg');
    }


    /**
     * 圆形图片
     */
    public function circle(Request $request)
    {
        $imgpath = storage_path('temp/demo.jpg');
        $ext     = pathinfo($imgpath);
        $src_img = null;
        switch ($ext['extension']) {
            case 'jpeg':
            case 'jpg':
                $src_img = imagecreatefromjpeg($imgpath);
                break;
            case 'png':
                $src_img = imagecreatefrompng($imgpath);
                break;
        }
        $wh  = getimagesize($imgpath);
        $w   = $wh[0];
        $h   = $wh[1];
        $w   = min($w, $h);
        $h   = $w;
        $img = imagecreatetruecolor($w, $h);
        imagesavealpha($img, true);
        //拾取一个完全透明的颜色,最后一个参数127为全透明
        $bg = imagecolorallocatealpha($img, 255, 255, 255, 127);
        imagefill($img, 0, 0, $bg);
        $r   = $w / 2; //圆半径
        $y_x = $r; //圆心X坐标
        $y_y = $r; //圆心Y坐标
        for ($x = 0; $x < $w; $x++) {
            for ($y = 0; $y < $h; $y++) {
                $rgbColor = imagecolorat($src_img, $x, $y);
                if (((($x - $r) * ($x - $r) + ($y - $r) * ($y - $r)) < ($r * $r))) {
                    imagesetpixel($img, $x, $y, $rgbColor);
                }
            }
        }
        imagepng($img, $imgpath);
        // imagejpeg($img, $imgpath);
        imagedestroy($img);
    }
}
