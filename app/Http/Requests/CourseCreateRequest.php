<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseCreateRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'master_Job' => ['required', 'string', 'max:255'],
            'master_name' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'introduction_v_link' => ['required'],
            'introduction' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }
}
