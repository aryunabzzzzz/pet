<?php

namespace App\Http\Requests;

use App\Data\DTO\Order\CreateOrderDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'customerId' => 'required|exists:users,id',
            'address' => 'required|string',
            'comment' => 'nullable|string',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            '*.required'=>'Поле :attribute обязательное',
            '*.string'=>'Поле :attribute должно быть строкой',
        ];
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->input('customerId');
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->input('address');
    }

    /**
     * @return string|null
     */
    public function getComment(): string|null
    {
        return $this->input('comment');
    }

    /**
     * @return CreateOrderDTO
     */
    public function createOrderDTO(): CreateOrderDTO
    {
        return new CreateOrderDTO(
            $this->getCustomerId(),
            $this->getAddress(),
            $this->getComment()
        );
    }
}
