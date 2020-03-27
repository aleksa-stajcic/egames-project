<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGameRequest extends FormRequest
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
            'title' => 'required|',
            'year' => 'required|integer',
            'desc' => 'required',
            'ddlPublisher' => 'exists:Publishers,Id',
            'ddlDevelopers' => 'exists:Developers,Id',
            'cover' => 'required|image',
            'banner' => 'required|image',
        ];
    }
}
