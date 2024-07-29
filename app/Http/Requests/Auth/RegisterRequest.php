<?php

namespace App\Http\Requests\Auth;

use App\Data\DTO\Auth\RegisterCustomerDTO;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|regex:/[a-zA-Z]{3,}/|string',
            'phone' => 'required|regex:/\+?\d?[ .]?[ .\-(]?\d{3}[ .\-)]?[ .]?\d{3}[ .\-]?\d{2}[ .\-]?\d{2}/|string',
            'email' => 'required|string|regex:/\w+?.?\w+@\w+.\w{2,5}/|unique:users,email',
            'birthday' => 'nullable|date',
            'password' => 'required|string',
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
            '*.date'=>'Поле :attribute должно быть датой'
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->get('name');
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->get('phone');
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->get('email');
    }

    /**
     * @return string|null
     */
    public function getBirthday(): ?string
    {
        return $this->get('birthday');
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->get('password');
    }

    /**
     * @return RegisterCustomerDTO
     */
    public function registerUserDTO(): RegisterCustomerDTO
    {
        return new RegisterCustomerDTO(
            $this->getName(),
            $this->getPhone(),
            $this->getEmail(),
            $this->getBirthday(),
            $this->getPassword()
        );
    }
}
