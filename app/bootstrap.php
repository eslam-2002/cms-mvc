 <?php

 require_once "config/config.php";
 require_once "helpers/url_helper.php";
 require_once "helpers/session_helper.php";
// require_once "cms/Core.php";
// require_once "cms/Controller.php";
// require_once "cms/Database.php";

//Autoload Core Libraaries

spl_autoload_register(function($classneme){
    require_once "../cms/".$classneme.".php";

});