<?php

namespace libraries;

use Doctrine\ORM\EntityManager;
use models\Entities\User;

/**
 * Access Control List Library
 *
 * @package     Library
 * @author      Ricardo
 * @copyright   Copyright (c) 2015, Code Pad
 * @since       Versão 1.0
 */
class Acl
{
    private $class = null;

    public function __construct(\CI_Controller $controller)
    {
        $this->class = get_class($controller);
    }

    /**
     *
     * @param EntityManager $em
     * @param User $user
     * @return boolean
     */
    public function check(EntityManager $em, User $user)
    {
        $output = false;

        return $output;
    }
}
