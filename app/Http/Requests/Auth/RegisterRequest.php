<?php

namespace App\Http\Requests\Auth;

use App\Data\DTO\Auth\RegisterUserDTO;
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
            'roleId' => 'required|exists:roles,id',
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
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
            '*.date'=>'Поле :attribute должно быть датой',
        ];
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->get('roleId');
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
    public function getBirthday(): string|null
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
     * @return RegisterUserDTO
     */
    public function registerUserDTO(): RegisterUserDTO
    {
        return new RegisterUserDTO(
            $this->getRoleId(),
            $this->getName(),
            $this->getPhone(),
            $this->getEmail(),
            $this->getBirthday(),
            $this->getPassword()
        );
    }
}
