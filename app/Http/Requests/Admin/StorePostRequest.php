<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required','exists:categories,id'],
            'title' => ['required','max:255'],
            'image' => [
                'nullable',
                'file',
                'image',
                'max:5000',//ファイル容量が5000kb(5MB)以下
                'mimes:jpeg,jpg,png',//形式はjpegかpng
                'dimensions:min_width=300,min_height=300,max_width=2000,max_height=2000', // 画像の解像度が300px * 300px ~ 2000px * 2000px
            ],
            'url' => ['nullable','url'],
            'content' => ['required','max:20000'],
            'genres.*' => ['distinct','exists:genres,id'],
        ];
    }
}
