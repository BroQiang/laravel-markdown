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
            $validate = $image->validateUpload($request, 'editormd-image-file');
            if (isset($validate) && !$validate['success']) {
                return $validate;
            }

            $info = $image->upload($request->file('editormd-image-file'), [
                'folder'      => config('bro_markdown.upload_path'),
                'file_prefix' => config('bro_markdown.image_prefix'),
                'max_width'   => config('bro_markdown.image_max_width', ''),
            ]);

            return $info;
        }

    }
}
