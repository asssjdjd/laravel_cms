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
        return [
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subTitle' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages() : array
    {
        return [
            'name.required' => 'Tên laptop không được để trống.',
            'title.required' => 'Tiêu đề không được để trống',
            'subTitle.required' => 'Tiêu đề phụ không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
            'image.required' => 'Chưa tải ảnh.',
        ];
    }
}
