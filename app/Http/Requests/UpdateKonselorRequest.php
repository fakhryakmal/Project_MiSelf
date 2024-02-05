<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKonselorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nama_konselor' => ['required', 'max:100'],
            'email' => ['required', 'email'],
            'nomor_hp' => ['required', 'numeric'],
            'pendidikan_terakhir' => ['required'],
            'pengalaman' => ['required'],
            'alamat' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'status' => ['required'],
        ];
    }
}
