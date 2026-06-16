<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array

    {

        return [

            'system_id' => 'required|string|max:100',

            'store_name' => 'required|string|max:255',

            'phone' => 'required|string|max:20',

            'location_code' => 'required|string|max:10',

            'username' => 'required|string|max:100',

            'password' => 'required|string|min:6',

        ];

    }
}
