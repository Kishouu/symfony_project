<?php

namespace App\Tests\Service;

use App\Service\RegistrationService;
use PHPUnit\Framework\TestCase;

class RegistrationServiceTest extends TestCase
{
    private $registrationService;

    protected function setUp(): void
    {
        $this->registrationService = new RegistrationService();
    }

    public function testRegister(): void
    {
        $email = 'user@example.com';
        $password = 'password123';

        $result = $this->registrationService->register($email, $password);

        $this->assertTrue($result);
    }
}
