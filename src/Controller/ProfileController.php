<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfileController extends AbstractController
{
#[Route('/api/profile', name: 'api_profile', methods: ['GET'])]
public function profile(): JsonResponse
{
$user = $this->getUser();

return $this->json([
'user' => $user ? $user->getUserIdentifier() : 'Anonymous'
]);
}
}
