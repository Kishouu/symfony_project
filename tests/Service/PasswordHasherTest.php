<?php

namespace App\Tests\Service;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PasswordHasherTest extends TestCase
{
    private $passwordHasher;

    protected function setUp(): void
    {
        $this->passwordHasher = $this->createMock(UserPasswordHasherInterface::class);
    }

    public function testHashPassword(): void
    {
        $user = new User();
        $password = 'password123';
        $hashedPassword = 'hashed_password123';

        $this->passwordHasher
            ->method('hashPassword')
            ->willReturn($hashedPassword);

        $this->assertEquals($hashedPassword, $this->passwordHasher->hashPassword($user, $password));
    }
}
