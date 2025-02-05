<?php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CustomCredentialsBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\Authenticator\Token\PostAuthenticationToken;

class TokenAuthenticator extends AbstractAuthenticator
{
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

return new SelfValidatingPassport(
new UserBadge($token, function ($userIdentifier) use ($token) {
// Load the user using the token
return new PostAuthenticationToken($userIdentifier, 'main', ['ROLE_USER'], $token);
}),
[new CustomCredentialsBadge(function($credentials, UserProviderInterface $userProvider) {
// Custom credential check logic (e.g., validate token)
return true;
}, $token)]
);
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
