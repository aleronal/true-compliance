<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
             'organisation' => ['required'],
             'property_type' => ['required'],
             'parent_property_id'=> ['required'],
             'uprn'=> ['required'],
             'address'=> ['required'],
             'town'=> ['required'],
             'postcode'=> ['required'],
             'live'=> ['required'],
        ];
    }
}
