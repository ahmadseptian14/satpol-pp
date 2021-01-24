<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            // 'image' => 'required|image',
            'nip' => 'required|max:255',
            'nama' => 'required|max:255',
            'agama' => 'required|max:255',
            'angkatan' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'alamat' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'no_hp' => 'required|max:255',
        ];
    }
}
