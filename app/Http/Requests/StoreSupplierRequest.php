<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2',
            'phone' => 'required|min:2',
            'email' => 'required|min:2',
            'location' => 'required|min:2',
            'post_id' => 'required|exists:posts,id',
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
