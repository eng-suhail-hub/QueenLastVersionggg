<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'university_major_id' => ['required', 'exists:university_majors,id'],

            'F_name'  => ['required', 'string'],
            'S_name'  => ['required', 'string'],
            'Th_name' => ['required', 'string'],
            'Su_name' => ['required', 'string'],

            'phone_number'      => ['nullable', 'string'],
            'graduation_date'   => ['nullable', 'date'],
            'graduation_grade'  => ['nullable', 'numeric'],
            'certificate_image' => ['nullable', 'string'],
        ];
    }
}
