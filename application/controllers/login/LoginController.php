<?php

use models\Entities\Access\Profile;
use models\Entities\Access\User;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Doctrine $doctrine Doctrine
 */
class LoginController extends CI_Controller
{

    public $doctrine;

    public function index()
    {
        $usersRepo = $this->doctrine->em->getRepository('models\Entities\Access\User');
        $users = $usersRepo->findAll();

        $dataView = array(
            'arrUsers' => $users
        );

        $this->load->view('adm\UserListView', $dataView);
    }

    

}
