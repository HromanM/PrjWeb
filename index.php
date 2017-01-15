<?php
mb_internal_encoding("UTF-8");

// automatic class loading
function autoloadFc($class)
{
        // Konин nбzev tшнdy шetмzcem "Kontroler" ?
        if (preg_match('/Controller/', $class))
                require("Controllers/" . $class . ".php");       
        else
                require("Models/" . $class . ".php");
}
spl_autoload_register("autoloadFc");

// database connection
SimpleDBWrapper::dbConnect("127.0.0.1", "root", "", "db_msrmesweb");

// page content control
$router = new RouterController();
$router->ctrlProcess(array($_SERVER['REQUEST_URI']));
$router->ctrlWriteView();

?>