<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','string','min:8','confirmed'],
            'image' => [
                'nullable',
                'file',
                'image',
                'max:5000',//ファイル容量が5000kb(5MB)以下
                'mimes:jpeg,jpg,png',//形式はjpegかpng
                'dimensions:min_width=300,min_height=300,max_width=2000,max_height=2000', // 画像の解像度が300px * 300px ~ 2000px * 2000px
            ]
        ];
    }
}
