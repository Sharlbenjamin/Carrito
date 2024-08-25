<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepairPartStoreRequest extends FormRequest
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
            'part_id' => ['required', 'integer', 'exists:parts,id'],
            'repair_id' => ['required', 'integer', 'exists:repairs,id'],
            'cost' => ['nullable', 'integer'],
        ];
    }
}
