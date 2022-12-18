<?php
    spl_autoload_register(function ($class){
        require_once($class.'.php');
    });

    // Load helper
    require_once 'helpers/URL_helper.php';
    require_once 'helpers/Session_Helper.php';
    //    Load configuration
    require_once 'config/config.php';

    //    Load Libraries
    require_once 'libraries/Core.php';
    require_once 'libraries/Controller.php';
    require_once 'libraries/Database.php';

?>