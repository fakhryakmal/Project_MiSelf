<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAturJadwalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_konseling' =>['required'],
            'id_konselor' =>['required'],
            'tanggal_konseling' =>['required'],
            'waktu_konseling' =>['required'],
            'tempat_konseling' =>['required'],
            'status' =>['required'],
        ];
    }
}
