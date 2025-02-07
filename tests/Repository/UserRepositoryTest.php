<?php

namespace App\Tests\Repository;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    private $entityManager;
    private $userRepository;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->userRepository = $this->createMock(ObjectRepository::class);
    }

    public function testFindUserByEmail(): void
    {
        $email = 'user@example.com';
        $user = new User();
        $user->setEmail($email);

        $this->userRepository
            ->method('findOneBy')
            ->with(['email' => $email])
            ->willReturn($user);

        $result = $this->userRepository->findOneBy(['email' => $email]);

        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals($email, $result->getEmail());
    }
}
