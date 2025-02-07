<?php

namespace App\Tests\Validator;

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Validation;
use PHPUnit\Framework\TestCase;

class EmailValidatorTest extends TestCase
{
    public function testValidEmail(): void
    {
        $validator = Validation::createValidator();
        $emailConstraint = new Email();
        $violations = $validator->validate('user@example.com', $emailConstraint);

        $this->assertCount(0, $violations);
    }

    public function testInvalidEmail(): void
    {
        $validator = Validation::createValidator();
        $emailConstraint = new Email();
        $violations = $validator->validate('invalid-email', $emailConstraint);

        $this->assertGreaterThan(0, $violations->count());
    }
}
