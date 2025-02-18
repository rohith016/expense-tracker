<?php

namespace App\Http\Requests\expenses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric',
            'description' => 'string',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Amount must be a number',
            'description.string' => 'Description must be a string',
            'date.required' => 'Date is required',
            'date.date' => 'Date must be a valid date',
            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Category does not exist',
            'user_id.required' => 'User is required',
            'user_id.exists' => 'User does not exist',
        ];
    }
}
