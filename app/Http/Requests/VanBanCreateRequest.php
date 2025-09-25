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
            'so_hieu'=>'required',
            'ngay_ban_hanh'=>'required',
            'tieu_de'=>'required',
            'tag'=>'array',
            'file'=>'required|mimes:pdf,doc,docx'
        ];
    }

    public function messages(): array
    {
        return [
            'so_hieu.required'=>'Trường này không được trống',
            'ngay_ban_hanh.required'=>'Trường này không được trống',
            'tieu_de.required'=>'Trường này không được trống',
            'file.required'=>'Trường này không được trống'
        ];
    }
}
