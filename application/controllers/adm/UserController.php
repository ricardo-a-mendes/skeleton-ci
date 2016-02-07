<?php

use models\Entities\Access\Profile;
use models\Entities\Access\User;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Doctrine $doctrine Doctrine
 */
class UserController extends CI_Controller
{

    public $doctrine;

    public function index()
    {
        $usersRepo = $this->doctrine->em->getRepository('models\Entities\Access\User');
        $users = $usersRepo->findAll();

        echo '<pre>';
print_r(base_url());
echo '</pre>';

        $dataView = array(
            'arrUsers' => $users
        );

        $this->load->view('adm\UserListView', $dataView);
    }

    public function edit()
    {
        /*
          $auth = new libraries\Authentication;
          $user = new User();
          $user->setEmail('eng.rmendes@gmail.com');
          $user->setPassword('1234');
          $output = $auth->authenticate($this->doctrine->em, $user);
          echo '<pre>';
          print_r($output);
          echo '</pre>';

          $acl = new \libraries\Acl($this);
          echo '<pre>';
          print_r($acl);
          echo '</pre>';

         */
        /*
        $perifl = new Profile();
        $perifl->setName('Administrador');
        $perifl->setDescription('Admin do sistema');

        $usuario = new User();
        $usuario->setName('Ricardo');
        $usuario->setEmail('eng.rmendes@gmail.com');
        $usuario->setPassword('123');
        $usuario->addProfile($perifl);

        $this->doctrine->em->persist($usuario);
        $this->doctrine->em->flush();
        */
        $user = $this->doctrine->em->find('models\Entities\Access\User', 1);

        if ($user instanceof User)
        {
            $this->load->view('adm\UserFormView', array('usuario' => $user));
        }
    }

}
