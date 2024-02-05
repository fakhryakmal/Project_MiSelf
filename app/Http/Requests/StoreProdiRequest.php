<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProdiRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nama_prodi' => [
                'required',
                Rule::unique('prodis', 'nama_prodi')->ignore($this->route('prodi')), 
            ],
            'nama_sekprod' => ['required'],
            'nomor_hp' => ['required'],
            'email' => ['required'],
            'username' => [
                'required',
                Rule::unique('prodis', 'username')->ignore($this->route('prodi')), 
            ],
            'password' => ['required'],
            'status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'nama_prodi.unique' => 'Prodi sudah ada.',
            'username.unique' => 'Username sudah digunakan.',
        ];
    }
}
