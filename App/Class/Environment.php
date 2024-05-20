<?php 
    require_once dirname(__DIR__)."/vendor/autoload.php";
    class Environment {
        public function __construct(){
            $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
            $dotenv->load();
            defined('HOSTNAME') or define('HOSTNAME', $_ENV['HOSTNAME']);
            defined('USERNAME') or define('USERNAME', $_ENV['USERNAME']);
            defined('PASSWORD') or define('PASSWORD', $_ENV['PASSWORD']);
            defined('DATABASE') or define('DATABASE', $_ENV['DATABASE']);
            defined('TYPE_DB') or define('TYPE_DB', $_ENV['TYPE_DB']);
            defined('PATH_URL') or define('PATH_URL', dirname(__DIR__));

        }
        public function prePrint($value){
            echo "<pre>";
            print_r($value);
            echo "</pre>";
        }
    }
    new Environment;