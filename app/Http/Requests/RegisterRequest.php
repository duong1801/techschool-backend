<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone' => ['required', new PhoneNumber, 'min:11'],
            'name' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required'=>'không được để trống',
            'min'=>'tối thiểu :min ký tự'
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'Email người dùng',
            'password' => 'Mật khẩu'
        ];
    }
}
