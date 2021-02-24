<?php

namespace App\Http\Requests\Temp;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranStaffAhli extends FormRequest
{

    // custom
    protected $requestTopic = 'pendaftaran staff ahli KBMTI 2021';

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
            'name' => 'bail|required',
            'nim' => 'bail|required|unique:stafAhliRegistration',
            'id_line' => 'bail|required|unique:stafAhliRegistration',
            'no_wa' => 'bail|required|unique:stafAhliRegistration',
            'dept' => 'bail|required|array|',
            'time' => 'bail|required|array',
            'komitmen' => 'bail|required|mimes:zip,rar|max:2048'

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
            'name.required' => "Anda belum mengisi field 'Nama' pada {$this->requestTopic}.",
            // Field nim
            'nim.required' => "Anda belum mengisi field 'NIM' pada {$this->requestTopic}.",
            'nim.unique' => "Maaf, NIM yang Anda masukkan rupanya telah terdaftar pada database kami.",
            // Field id line
            'id_line.required' => "Anda belum mengisi field 'Id Line' pada {$this->requestTopic}.",
            'id_line.unique' => "Maaf, Id Line yang Anda masukkan rupanya telah terdaftar pada database kami.",
            // Field nomor whatsapp
            'no_wa.required' => "Anda belum mengisi field 'No Whatsapp' pada {$this->requestTopic}.",
            'no_wa.unique' => "Maaf, Nomor Whatsapp yang Anda masukkan rupanya telah terdaftar pada database kami.",
            // Field dept
            'dept.required' => "Anda belum mengisi field 'Departemen Pilihan' pada {$this->requestTopic}.",
            // Field time
            'time.required' => "Anda belum mengisi field 'Jadwal Interview' pada {$this->requestTopic}.",
            // Field komitmen
            'komitmen.required' => "Anda belum mengisi field upload file Komitmen pada {$this->requestTopic}",
            'komitmen.mimes' => "Anda mengupload file dengan format diluar ketentuan (zip / rar)",
            'komitmen.max' => "Anda mengupload file dengan size melebihi ketentuan (2048 kBytes)",
        ];
    }
}
