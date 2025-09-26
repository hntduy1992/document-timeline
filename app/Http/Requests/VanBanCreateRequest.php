<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VanBanCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'so_hieu'=>'required|unique:van_ban,so_hieu',
            'ngay_ban_hanh'=>'required',
            'tieu_de'=>'required',
            'file'=>'required|file|mimes:pdf,doc,docx'
        ];
    }

    public function messages(): array
    {
        return [
            'so_hieu.required'=>'Trường này không được trống!',
            'so_hieu.unique'=>'Số hiệu này đã có!',
            'ngay_ban_hanh.required'=>'Trường này không được trống!',
            'tieu_de.required'=>'Trường này không được trống!',
            'file.required'=>'Trường này không được trống!'
        ];
    }
}
