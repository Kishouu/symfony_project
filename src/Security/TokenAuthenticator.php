<?php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Authenticator\JWTAuthenticator;

class TokenAuthenticator extends JWTAuthenticator
{
private $userProvider;

public function __construct(UserProviderInterface $userProvider)
{
$this->userProvider = $userProvider;
}

public function supports(Request $request): ?bool
{
return $request->headers->has('Authorization');
}

public function authenticate(Request $request): Passport
{
$token = $request->headers->get('Authorization');

if (null === $token) {
throw new CustomUserMessageAuthenticationException('No API token provided');
}

return new SelfValidatingPassport(new UserBadge($token, function ($userIdentifier) use ($token) {
return $this->userProvider->loadUserByIdentifier($userIdentifier);
}));
}

public function onAuthenticationSuccess(Request $request, $token, string $firewallName): ?Response
{
return null;
}

public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
{
return new JsonResponse(['error' => 'Authentication failed'], Response::HTTP_UNAUTHORIZED);
}
}
