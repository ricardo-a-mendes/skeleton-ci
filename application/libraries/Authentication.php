<?php

namespace libraries;

use Doctrine\ORM\EntityManager;
use models\Entities\User;

/**
 * Authentication Library
 *
 * @package     Auth
 * @author      Ricardo
 * @copyright   Copyright (c) 2015, Code Pad
 * @since       Versão 1.0
 */
class Authentication
{
    /**
     * Check if user is active and password matches
     *
     * @param EntityManager $em
     * @param User $user
     * @return User User class filled if success, new User otherwise.
     */
    public function authenticate(EntityManager $em, User $user)
    {
        $criteria = array('email' => $user->getEmail(), 'active' => 1);
        $userDB = $em->getRepository('models\Entities\User')->findOneBy($criteria);

        return ($userDB instanceof User && $userDB->getPassword() === $user->getPassword()) ? $userDB : new User();
    }
}
