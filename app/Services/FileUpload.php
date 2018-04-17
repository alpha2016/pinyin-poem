<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUpload
{
    /**
     * 保存文件
     * @param $file file
     * @param $type image  2018.04.17 暂时只有 image
     */
    protected $extList = ['jpg', 'png', 'jpeg', 'gif', 'bmp', 'tiff'];

    public static function store($file, $disk = 'public', $dir = '')
    {
        $hashName = str_ireplace('.jpeg', '.jpg', $file->hashName());
        $extension = pathinfo($file->getClientOriginalName())['extension'];
        $filename = pathinfo($hashName)['filename'] . '.' . $extension;
        $mime = $file->getMimeType();
        $path = Storage::disk($disk)->putFileAs($dir, $file, $filename);
        return [
            'success' => true,
            'filename' => $hashName,
            'original_name' => $file->getClientOriginalName(),
            'mime' => $mime,
            'size' => $file->getClientSize(),
            'relative_url' => $path,
            'url' => Storage::disk($disk)->url($path),
        ];
    }


    protected function fixMissingStorageSymlink()
    {
        app('files')->link(storage_path('app/public'), public_path('storage'));
    }


    public function checkValid($file, $mimeTypes, $size = null)
    {
        if ($size && $file->getClientSize() > $size) {
            return false;
        }

        $mimeType = strtolower($file->getClientOriginalExtension());

        if ($mimeType && in_array($mimeType, $mimeTypes) && !in_array($mimeType, $this->extList)) {
            return true;
        }
        return false;
    }
}