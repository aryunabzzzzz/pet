<?php

namespace App\Http\Requests;

use App\Data\DTO\Customer\StoreCustomerDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'phone'=>'required|string|unique:users,phone',
            'email'=>'required|string|email|unique:users,email',
            'birthday'=>'nullable|date',
            'password'=>'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required'=>'Поле :attribute обязательное',
            '*.string'=>'Поле :attribute должно быть строкой',
            '*.date'=>'Поле :attribute должно быть датой',
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
     * @return string
     */
    private function getPhone(): string
    {
        return $this->input('phone');
    }

    /**
     * @return string
     */
    private function getEmail(): string
    {
        return $this->input('email');
    }

    /**
     * @return string|null
     */
    private function getBirthday(): ?string
    {
        return $this->input('birthday');
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->input('password');
    }

    /**
     * @return StoreCustomerDTO
     */
    public function storeUserDTO(): StoreCustomerDTO
    {
        return new StoreCustomerDTO(
        $this->getName(),
        $this->getPhone(),
        $this->getEmail(),
        $this->getBirthday(),
        $this->getPassword()
        );
    }
}
