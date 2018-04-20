<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use QrCode;

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
}
