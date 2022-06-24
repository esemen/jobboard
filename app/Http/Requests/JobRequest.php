<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'industry_id' => 'nullable|exists:industries,id',
            'company_id' => 'exists:companies,id',
            'job_type_id' => 'required|exists:job_types,id',
            'location_id' => 'required|exists:locations,id',
            'salary_type_id' => 'nullable|required_unless:salary_min,null|exists:salary_types,id',
            'publish_start' => 'nullable|date',
            'publish_end' => 'nullable|date|after:publish_start',
            'salary_min' => 'nullable|numeric|min:0|required_unless:salary_max,null',
            'salary_max' => 'nullable|numeric|gt:salary_min',
            'currency_id' => 'nullable|exists:currencies,id|required_unless:salary_min,null',
            'description' => 'nullable'
        ];
    }
}
