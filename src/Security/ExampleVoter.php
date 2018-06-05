<?php
/**
 * Created by PhpStorm.
 * User: Nearshore Portugal
 * Date: 6/5/2018
 * Time: 10:57 AM
 */

namespace App\Security;


use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

class ExampleVoter implements VoterInterface
{


    public function vote(TokenInterface $token, $subject, array $attributes)
    {
        //implement vote method

    }
}