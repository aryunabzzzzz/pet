<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
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
            'foodId' => 'required|exists:foods,id',
            'quantity' => 'required|integer'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            '*.required'=>'Поле :attribute обязательное',
            '*.integer'=>'Поле :attribute должно быть целочисленным'
        ];
    }

    /**
     * @return int
     */
    public function getFoodId(): int
    {
        return $this->input('foodId');
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->input('quantity');
    }

}
