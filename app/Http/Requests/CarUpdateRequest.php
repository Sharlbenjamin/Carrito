<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'name' => ['required', 'string', 'max:50'],
            'brand_id' => ['nullable', 'integer', 'exists:brands,id'],
            'type_id' => ['nullable', 'integer', 'exists:types,id'],
            'year' => ['nullable'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'name' => ['required', 'string', 'max:50'],
            'brand_id' => ['nullable', 'integer', 'exists:brands,id'],
            'type_id' => ['nullable', 'integer', 'exists:types,id'],
            'year' => ['nullable'],
            'kilometers' => ['nullable', 'integer'],
            'license_date' => ['nullable', 'date'],
            'license' => ['nullable', 'string'],
            'l_r_t' => ['nullable', 'integer'],
            'license_date' => ['nullable', 'date'],
            'license' => ['nullable', 'string'],
            'l_r_t' => ['nullable', 'integer'],
        ];
    }
}
