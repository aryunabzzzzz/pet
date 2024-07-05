<?php

namespace App\Http\Requests;

use App\Data\DTO\User\StoreUserDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'roleId'=>'required|exists:roles,id',
            'name'=>'required|string',
            'avatarId'=>'exists:images,id',
            'phone'=>'required|string|unique:users,phone',
            'email'=>'required|string|email|unique:users,email',
            'birthday'=>'nullable|date',
            'password'=>'required|string',
        ];
    }

    /**
     * @return int
     */
    private function getRoleId(): int
    {
        return $this->input('roleId');
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
    private function getAvatarId(): int
    {
        return $this->input('avatarId');
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
    private function getBirthday(): string|null
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
     * @return StoreUserDTO
     */
    public function storeUserDTO(): StoreUserDTO
    {
        return new StoreUserDTO(
        $this->getRoleId(),
        $this->getName(),
        $this->getAvatarId(),
        $this->getPhone(),
        $this->getEmail(),
        $this->getBirthday(),
        $this->getPassword()
        );
    }
}
