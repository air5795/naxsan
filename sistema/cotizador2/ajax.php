<?php

require_once 'app/config.php';

try {
    if(!isset($_POST['action']) && !isset($_GET['action'])){
        throw new Exception ("El acceso no esta autorizado");
    }

    // guardar el valor de action 
    $action = isset($_POST['action']) ? $_POST['action'] : $_GET['action'];
    $action = str_replace('-','_',$action);
    $function = sprintf('hook_%s',$action);

    // validar la existencia de funcion 
    if(!function_exists($function)){
        throw new Exception ("El acceso no esta autorizado");
    }

    // se ejecuta la funcion 
    $function();

} catch (Exception $e) {
    json_output(json_build(403,null,$e->getMessage()));
}
?>