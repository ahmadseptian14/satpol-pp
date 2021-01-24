<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PerformanceRequest extends FormRequest
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
            'members_id' => 'integer|exists:members,id',
            'kegiatan' => 'required|max:255',
            'lama_waktu' => 'required|max:255',
            'hasil' => 'required|max:255',
            'waktu' => 'required|max:255',
        ];
    }
}
