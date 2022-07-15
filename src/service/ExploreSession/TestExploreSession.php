 
<?php
namespace Nettivene\Service\ExploreSession;

use Symfony\Component\HttpFoundation\RequestStack;

class TestExploreSession
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getSessionValue():string
    {
        $session = $this->requestStack->getSession();

        $session->set('first_name', 'Jenny');

        return $session->get('first_name');

    }
}

