<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdiRequest extends FormRequest
{
    public function rules()
    {
        return [
            //
            'nama_prodi' =>['required'],
            'nama_sekprod' =>['required'],
            'nomor_hp' =>['required'],
            'email' =>['required'],
            'username' =>['required'],
            'password' =>['required'],
        ];
    }
}
