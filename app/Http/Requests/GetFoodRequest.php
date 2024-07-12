<?php

namespace App\Http\Requests;

use App\Data\DTO\Food\GetFoodDTO;
use Illuminate\Foundation\Http\FormRequest;

class GetFoodRequest extends FormRequest
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
            'name'=>'string',
            'categoryId'=>'exists:categories,id',
            'price'=>'numeric',
            'minPrice'=>'numeric',
            'maxPrice'=>'numeric'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            '*.string'=>'Поле :attribute должно быть строкой',
            '*.numeric'=>'Поле :attribute должно быть числом',
        ];
    }

    /**
     * @return string|null
     */
    private function getName(): string|null
    {
        return $this->input('name');
    }

    /**
     * @return int|null
     */
    private function getCategoryId(): int|null
    {
        return $this->input('categoryId');
    }

    /**
     * @return float|null
     */
    private function getPrice(): float|null
    {
        return $this->input('price');
    }

    /**
     * @return float|null
     */
    private function getMinPrice(): float|null
    {
        return $this->input('minPrice');
    }

    /**
     * @return float|null
     */
    private function getMaxPrice(): float|null
    {
        return $this->input('maxPrice');
    }

    /**
     * @return GetFoodDTO
     */
    public function getFoodDTO(): GetFoodDTO
    {
        return new GetFoodDTO(
            $this->getName(),
            $this->getCategoryId(),
            $this->getPrice(),
            $this->getMinPrice(),
            $this->getMaxPrice()
        );
    }
}
