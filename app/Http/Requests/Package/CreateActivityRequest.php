<?php

namespace App\Http\Requests\Package;

use Illuminate\Foundation\Http\FormRequest;

class CreateActivityRequest extends FormRequest
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
            'title' => 'required|min:3|unique:activities',
            'slug' => 'required|unique:activities|min:3|regex:/^([a-z0-9._-]+)$/',
        ];
    }
}