<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserRepository
{
    private Persistence $persistence;

    public function __construct(Persistence $persistence)
    {
        $this->persistence = $persistence;
    }

    public function generateId(): int
    {
        return $this->persistence->generateId();
    }

    public function findById(int $id): User
    {
        $data = $this->persistence->retrieve($id);
        return User::fromArray($data);
    }

    public function save(User $user): void
    {
        $this->persistence->persist($user->toArray());
    }
}