<?php

namespace App\Http\Requests\Pasien;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePasienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_pasien'   =>  'required',
            'jenis_kelamin' =>  'required',
            'umur'          =>  'required',
        ];
    }
}
