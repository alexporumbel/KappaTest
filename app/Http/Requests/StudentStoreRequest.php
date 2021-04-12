<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'studentId' => 'required|numeric|unique:App\Models\Student,studentId',
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|exists:App\Models\StudentEmail,email|unique:App\Models\Student,email',
            'phone' => 'required|numeric',
            'birthDate' => 'required|date_format:"d-m-Y"',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
                'studentId.required' => 'Student Id is required',
                'studentId.numeric' => 'Student Id needs to be numeric',
                'studentId.unique' => 'You already have an account',

                'name.required' => 'Name is required',
                'name.alpha' => 'Name contains forbidden characters',

                'email.required' => 'Email is required',
                'email.email' => 'Email is invalid',
                'email.exists' => 'You didn\'t subscribed at our university',
                'email.unique' => 'You already have an account',

                'phone.required' => 'Phone is required',
                'phone.numeric' => 'Enter your phone number without prefix',

                'birthDate.required' => 'Birth date is required',
                'birthDate.date_format' => 'Date format is not valid',
        ];
    }
}
