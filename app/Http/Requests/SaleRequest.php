<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SaleRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
        'client_id' => 'required:integer',
        'product_id' => 'required:integer',
        'sales_date' => 'required',
        'quantity' => 'required',
        'amount' => 'required',
        'total_amount' => 'nullable',
        'status' => 'nullable',
        'created_by' => 'nullable',
        'active' => 'nullable',

        ];
    }

    public function messages()
    {
        return [
            'unique' => ':attribute is already used',
            'required' => 'The :attribute field is required.',
        ];
    }

    public function passedValidation()
    {
        $this->merge([
            'created_by' => Auth::id()
        ]);
    }
}
