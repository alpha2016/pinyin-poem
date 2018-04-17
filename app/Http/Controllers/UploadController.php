<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileUpload;

class UploadController extends Controller
{
    /**
     * 上传
     */
    public function index(Request $request)
    {
        $file = $request->file('file');
        $type = htmlspecialchars($request->input('type'));
        $pathInfo = FileUpload::store($file, 'public', $type);

        return response()->success($pathInfo);
    }
}
