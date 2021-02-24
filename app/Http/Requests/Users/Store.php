<?php

namespace App\Http\Requests\Users;

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
            'email' => 'bail|required|unique:users|email',
            'password' => 'bail|required|min:8',
            'confirm_password' => 'bail|required|same:password',
            'adminId' => 'bail|required|numeric'
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
            'name.required' => "Anda belum mengisi field 'Nama' pada form penambahan users.",
            // Field email
            'email.required' => "Anda belum mengisi field 'Email / Username' pada form penambahan users.",
            'email.unique' => "Maaf, email yang Anda masukkan rupanya telah terdaftar pada database kami.",
            'email.email' => "Maaf, format email yang Anda daftarkan tidak valid dengan format email pada umumnya.",
            // Field Password
            'password.required' => "Anda belum mengisi field 'Role User' pada form penambahan users.",
            'password.min' => "Panjang minimal password adalah 8 digit",
            // Field Confirm Password
            'confirm_password.required' => "Anda belum mengisi field 'Confirm Password' pada form penambahan users.",
            'confirm_password.same' => "Maaf, kami mendeteksi bahwa field 'Password' dan 'Confirm Password' tidak cocok, harap ulangi pengisian",
            // Field adminId
            'amindId.required' => "Anda belum mengisi 'Role User' pada form penambahan users.",
            'adminId.numeric' => "Masukan Anda pada field 'Role User' tidak valid, harap Anda ulangi.",

        ];
    }
}
