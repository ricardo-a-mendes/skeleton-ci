<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with mechanism to retrieve EntityManager in your app
define('APPPATH', getcwd().DIRECTORY_SEPARATOR.'application/');
define('BASEPATH', APPPATH);
define('ENVIRONMENT', 'development');

require APPPATH .DIRECTORY_SEPARATOR. 'libraries/Doctrine.php';
$doctrine = new Doctrine();
$entityManager = $doctrine->em; //GetEntityManager();

return ConsoleRunner::createHelperSet($entityManager);