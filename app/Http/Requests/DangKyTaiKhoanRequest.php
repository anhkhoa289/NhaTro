<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyTaiKhoanRequest extends FormRequest
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
            'holot' => 'required|max:255',
            'ten' => 'required|max:255',
            'ngSinh' => 'required',
            'tinh' => 'required',
            'quan' => 'required',
            'phuong' => 'required',
            'diaChi' => 'required',
            'email' => 'required',
            'tenDangNhap' => 'required|unique:TaiKhoan|max:255',
            'matkhau'=> 'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'tenDangNhap.required' => 'Tối thiểu 6 ký tự',
            'tenDangNhap.unique' => 'Tên đăng nhập này đã được sử dụng',
            'email.required'=> 'Email không được rỗng',
            'matkhau.required' => 'Tối thiểu 6 ký tự'
        ];
    }
    public function withValidator($validator)
    {
        // $validator->after(function ($validator) {
        //         $validator->errors()->add('email1', 'Something is wrong with this field!');
        // });
    }
}
