<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreGadgetRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'title' => 'required|string|max:255',
            'subTitle' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'brand' => 'nullable|string|max:255',
        ];
    }

    public function messages() : array
    {
        return [
            'title.required' => 'Tiêu đề không được để trống.',
            'subTitle.required' => 'Tiêu đề phụ không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'image.max' => 'Ảnh không được vượt quá 2MB.',
        ];
    }
}
