<?php

use Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\Common\Cache\ArrayCache;

/**
 * @property \Doctrine\ORM\EntityManager $em Gerenciador de Entidade
 * @property CI_Controller $ci Instance of CodeIgniter
 * @property CI_DB $db Database
 */
class Doctrine
{

    public $em = null;
    public $ci = null;
    public $db = null;

    public function __construct()
    {
        if (defined('FCPATH'))
        {
            //Get CI instance
            $this->ci = CI_Controller::get_instance();

            //Load database configuration from CodeIgniter
            $this->db = $this->ci->db;
            
            //Database connection information
            $connectionOptions = array(
                'user' => $this->db->username,
                'password' => $this->db->password,
                'host' => $this->db->hostname,
                'dbname' => $this->db->database
            );
        }
        elseif (ENVIRONMENT === 'development')
        {
            include_once str_replace("/", DIRECTORY_SEPARATOR, APPPATH).'config'.DIRECTORY_SEPARATOR.'development'.DIRECTORY_SEPARATOR.'database.php';

            $connectionOptions = array(
                'user' => $db['default']['username'],
                'password' => $db['default']['password'],
                'host' => $db['default']['hostname'],
                'dbname' => $db['default']['database']
            );
        }

        $connectionOptions['driver'] = 'pdo_mysql';
        $connectionOptions['charset'] = 'utf8';
        $connectionOptions['driverOptions'] = array(1002 => 'SET NAMES utf8');

        $config = new Configuration;

        //Set up caches
        $cache = new ArrayCache;
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        //Set up Annotation
        $driverImpl = $config->newDefaultAnnotationDriver(array(APPPATH . 'models/Entities'));
        $config->setMetadataDriverImpl($driverImpl);

        //Proxy configuration
        $config->setProxyDir(APPPATH . '/models/proxies');
        $config->setProxyNamespace('Proxies');
        $config->setAutoGenerateProxyClasses(TRUE);

        // Create EntityManager
        $this->em = EntityManager::create($connectionOptions, $config);

        //Fix the problem: "unknown database type enum requested"
        $platform = $this->em->getConnection()->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');
    }

}
