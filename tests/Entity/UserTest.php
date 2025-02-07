<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testEmail(): void
    {
        $user = new User();
        $user->setEmail('user@example.com');
        
        $this->assertEquals('user@example.com', $user->getEmail());
    }

    public function testPassword(): void
    {
        $user = new User();
        $user->setPassword('password123');
        
        $this->assertEquals('password123', $user->getPassword());
    }
}
