<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CkeditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Lưu file vào thư mục public/uploads/ckeditor
            $file->storeAs('public/uploads/ckeditor', $fileName);
            
            // Tạo URL cho file đã upload
            $url = asset('storage/uploads/ckeditor/' . $fileName);
            
            // Trả về response theo định dạng yêu cầu của CKEditor
            return response()->json([
                'url' => $url,
                'uploaded' => 1,
                'fileName' => $fileName
            ]);
        }
        
        return response()->json([
            'uploaded' => 0,
            'error' => [
                'message' => 'Không thể tải lên file.'
            ]
        ]);
    }
}
