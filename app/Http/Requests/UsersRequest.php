<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        // tạo ra 1 mảng
        $rules = [];
        // lấy ra tên phương thức cần sử lý
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction):
                    case 'login':
                        // xay dung rule validate trong nay
                        $rules = [
                            'email' => 'required|email:filter',
                            'password' => 'required ',
                        ];

                        break;
                endswitch;
                break;
        endswitch;

        return $rules;
    }
    public function messages()
    {
        return [
            'password.required' => 'Mật Khẩu Không Được Để Trống',
            'email.required' => 'Email Không Được Để Trống',
            'email.email' => 'Email Không Đúng Định Dạng',
        ];
    }
}
