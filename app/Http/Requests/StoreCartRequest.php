<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'customerId'=>'required|exists:users,id',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            '*.required'=>'Поле :attribute обязательное'
        ];
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->input('customerId');
    }
}
