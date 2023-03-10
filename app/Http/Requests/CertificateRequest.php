<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
            'property_id' => ['required','integer'],
            'stream_name' => ['required','string'],
            'issue_date' => ['required','date_format:Y-m-d'],
            'next_due_date' => ['required','date_format:Y-m-d']
        ];
    }
}
