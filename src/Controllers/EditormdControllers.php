<?php
namespace BroQiang\LaravelMarkdown\Controllers;

use BroQiang\LaravelImage\BroImage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EditormdControllers extends Controller
{
    public function upload(Request $request, BroImage $image)
    {
        if ($request->hasFile('editormd-image-file')) {
            $url = $image->upload(
                $request->file('editormd-image-file'),
                config('bro_markdown.upload_path', 'editormd'),
                config('bro_markdown.image_prefix', '')
            );

            if ($url) {
                return [
                    'success' => 1,
                    'url'     => $url,
                ];
            }

            return [
                'success' => 0,
                'message' => '上传失败',
                'url'     => '',
            ];
        }

    }
}
