<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAjukanRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'nim' =>['required'],
            'jenis_konseling' =>['required'],
            'tanggal_pengajuan' =>['required'],
            'alasan_pengajuan' =>['required'],
            'status' =>['required'],
        ];
    }
}
