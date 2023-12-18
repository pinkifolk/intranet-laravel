<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonalRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'type' => 'required',
            'name' => 'required',
            'lastName' => 'required',
            'jobTitle' => 'required',
            'department' => 'required',
            'birthday' => 'required',
            'email' => 'required|email',
            'emailPersonal' => 'required|email',
            'password' => 'required',
            'repitPassword' => 'required|same:password',
            'file' => 'file'
        ];
    }
}
