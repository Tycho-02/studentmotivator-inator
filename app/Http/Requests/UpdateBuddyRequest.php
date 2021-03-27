<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBuddyRequest extends FormRequest
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
            'naam' => 'required|max:10',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'skin' => 'required|String',
            'temp' => 'required|integer',
            'luchtvochtigheid' => 'required|integer',
            'licht' => 'required|integer',
        ];
    }
}
