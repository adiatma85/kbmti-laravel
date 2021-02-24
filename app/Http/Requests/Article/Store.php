<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,bmp,gif|max:2048'
            // Image harus dikasih batas upload, misal 200 kB, tapi masih di lihat-lihat lagi sih
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // Field name
            'name.required' => "Anda belum mengisi field 'nama' pada form penambahan artikel",
            // Field content
            'content.required' => "Anda belum mengisi field 'konten' pada form penambahan artikel",
            // Field image
            'image.required' => "Anda belum mengisi field gambar pada form penambahan artikel",
            'image.mimes' => "Anda mengupload file dengan format diluar ketentuan (jpeg, png, jpg)",
            'image.max' => "Anda mengupload file dengan size melebihi ketentuan (2048 kBytes)",
        ];
    }
}
