<?php 

function controller_autoload($className){
 include __DIR__. '/controllers/'. $className .'.php';

}

spl_autoload_register('controller_autoload');

?>