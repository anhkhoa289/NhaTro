<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemPhongTroRequest extends FormRequest
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
            'tenPhong' => 'required|max:255',
            'noiDung' => 'required',
            'gia' => 'required',
            'tinh' => 'required',
            'quan' => 'required',
            'phuong' => 'required',
            'diaChi' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'tenPhong.required' => 'Không được bỏ trống',
            'noiDung.required' => 'Không được bỏ trống',
            'gia.required' => 'Không được bỏ trống',
            'tinh.required' => 'Không được bỏ trống',
            'quan.required' => 'Không được bỏ trống',
            'phuong.required' => 'Không được bỏ trống',
            'diaChi.required' => 'Không được bỏ trống'
        ];
    }
}
