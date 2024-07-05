<?php

namespace App\Data\DTO\User;

class StoreUserDTO
{
    public function __construct(
        public readonly int $roleId,
        public readonly string $name,
        public readonly int $avatarId,
        public readonly string $phone,
        public readonly string $email,
        public readonly string|null $birthday,
        public readonly string $password,
    )
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'role_id' => $this->roleId,
            'name' => $this->name,
            'avatar_id' => $this->avatarId,
            'phone' => $this->phone,
            'email' => $this->email,
            'birthday' => $this->birthday,
            'password' => $this->password
        ];
    }
}
