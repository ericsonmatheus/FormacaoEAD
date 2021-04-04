<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'login' => ['required'],
            'password' => ['required']
        ];
    }

    public function messages() {
        return [
            'login.required' => 'Login é de preenchimento obrigatório',
            'password.required' => 'Senha é obrigatória'
        ];
    }
}
