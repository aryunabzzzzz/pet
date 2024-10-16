<?php

namespace App\Http\Requests;

use App\Data\DTO\Food\StoreFoodDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreFoodRequest extends FormRequest
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
            'name'=>'required|string',
            'categoryId'=>'required|exists:categories,id',
            'price'=>'required|numeric',
            'description'=>'string'
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
            '*.numeric'=>'Поле :attribute должно быть числом',
        ];
    }

    /**
     * @return string
     */
    private function getName(): string
    {
        return $this->input('name');
    }

    /**
     * @return int
     */
    private function getCategoryId(): int
    {
        return $this->input('categoryId');
    }

    /**
     * @return float
     */
    private function getPrice(): float
    {
        return $this->input('price');
    }

    /**
     * @return string|null
     */
    private function getDescription(): ?string
    {
        return $this->input('description');
    }

    /**
     * @return StoreFoodDTO
     */
    public function storeFoodDTO(): StoreFoodDTO
    {
        return new StoreFoodDTO(
            $this->getName(),
            $this->getCategoryId(),
            $this->getPrice(),
            $this->getDescription()
        );
    }
}
