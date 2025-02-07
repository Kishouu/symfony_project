<?php

namespace App\Tests\Repository;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use PHPUnit\Framework\TestCase;

class PostRepositoryTest extends TestCase
{
    private $entityManager;
    private $postRepository;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->postRepository = $this->createMock(ObjectRepository::class);
    }

    public function testFindPostByTitle(): void
    {
        $title = 'My First Post';
        $post = new Post();
        $post->setTitle($title);

        $this->postRepository
            ->method('findOneBy')
            ->with(['title' => $title])
            ->willReturn($post);

        $result = $this->postRepository->findOneBy(['title' => $title]);

        $this->assertInstanceOf(Post::class, $result);
        $this->assertEquals($title, $result->getTitle());
    }
}
