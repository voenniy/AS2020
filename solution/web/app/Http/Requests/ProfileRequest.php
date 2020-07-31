<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
        return[
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->id()),],
            'phone' => ['nullable', 'string','max:15'],
            'birthday' => ['nullable', 'date'],
            'avatar'    => ['image'],
            'password' => ['nullable','string', 'min:6', 'confirmed',
                'regex:/[A-Z]/',
                'regex:/[0-9]/'
            ],
        ];
    }
}
