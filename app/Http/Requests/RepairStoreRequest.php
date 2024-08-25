<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepairStoreRequest extends FormRequest
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
            'agency_id' => ['nullable', 'integer', 'exists:agencies,id'],
            'car_id' => ['required', 'integer', 'exists:cars,id'],
            'date' => ['nullable', 'date'],
            'invoice' => ['nullable', 'integer'],
        ];
    }
}
