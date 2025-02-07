<?php

namespace App\Tests\Service;

use App\Service\LoginService;
use PHPUnit\Framework\TestCase;

class LoginServiceTest extends TestCase
{
    private $loginService;

    protected function setUp(): void
    {
        $this->loginService = new LoginService();
    }

    public function testLogin(): void
    {
        $email = 'user@example.com';
        $password = 'password123';

        $result = $this->loginService->login($email, $password);

        $this->assertTrue($result);
    }
}
