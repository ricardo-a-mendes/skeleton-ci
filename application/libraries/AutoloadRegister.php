<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


//Autoloader do composer (modulos baixados por ele)
require_once APPPATH . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

//Registra o autoload das classes
spl_autoload_register('AutoloadRegister::register');

/**
 * Executa o autoload de classes que não são do CI nem de PEAR
 */
class AutoloadRegister
{

    const CI_PREFIX = "CI_";
    const PEAR = 'PEAR';

    /**
     * Faz o registro/load da classe
     *
     * @param string $classe
     * @return void
     */
    public static function register($classe)
    {
        //Classes do CI e do PEAR são ignoradas
        if (strstr($classe, self::CI_PREFIX) || stristr($classe, self::PEAR))
        {
            return;
        }

        $fileRequire = APPPATH . str_replace('\\', DIRECTORY_SEPARATOR, $classe) . '.php';

        if (!file_exists($fileRequire))
        {
            return;
        }

        require_once $fileRequire;
    }

}
