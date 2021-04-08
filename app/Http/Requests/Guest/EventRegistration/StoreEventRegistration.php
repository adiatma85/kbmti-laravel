<?php

namespace App\Http\Requests\Guest\EventRegistration;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRegistration extends FormRequest
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
        // Reference for the field that needed is in Guest/EventRegistration
        return [
            'nama' => 'bail|required|string',
            'nim' => 'bail|numeric',
            'angkatan' => 'bail|numeric',
            'email' => "bail|email",
            'id_line' => 'bail|string',
            'nomor_telepon' => 'bail|numeric',
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
            // Field nama lengkap
            'nama.required' => "Anda belum mengisi nama Anda pada field registrasi. Harap isi Field tersebut!",
            // Field nim
            'nim.numeric' => "Isian pada field nim tidak valid! Harap isi dengan benar.",
            // Field angkatan
            'angkatan.numeric' => "Isian pada field angkatan tidak valid! Harap isi dengan benar.",
            // Field email
            'email.email' => "Isian pada field email tidak valid! Harap isi dengan benar.",
            // Field id_line
            'id_line.string' => "Isian pada field id line tidak valid! Harap isi dengan benar.",
            // Field nomor_telepon
            'nomor_telepon.numeric' => "Isian pada field nomor telepon tidak valid! Harap isi dengan benar.",
        ];
    }
}
