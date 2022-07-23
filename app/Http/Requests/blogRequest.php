<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class blogRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ["required", "unique:blogs,name"],
            'email' => ['required', 'unique:blogs,email'],
            'address' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('messages.required'),
            'name.unique' => trans('validation.unique'),
            'email.required' => trans('messages.required'),
            'address.required' => trans('validation.required'),
        ];
    }
}
