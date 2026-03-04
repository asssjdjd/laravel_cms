<?php
namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreLaptopRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        $imageRule = $this->isMethod('post') ? 'required' : 'nullable';
        
        return [
            'title' => 'required|string|max:255',
            'subTitle' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => $imageRule . '|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages() : array
    {
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'subTitle.required' => 'Tiêu đề phụ không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
            'image.required' => 'Chưa tải ảnh.',
        ];
    }
}
