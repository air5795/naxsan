<?php

session_start();

//para saber si esta en servidor local 

define('IS_LOCAL',in_array($_SERVER['REMOTE_ADDR'],['12.0.0.1','::1']));
define('URL',(IS_LOCAL ? 'http://127.0.0.1/poncelet-sis/cotizador/': 'LA URL DE SU SERVIDOR EN PRODUCCION'));

//Rutas para carpetas

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',getcwd().DS);
define('APP',ROOT.'app'.DS);
define('ASSETS',ROOT.'assets'.DS);
define('TEMPLATES',ROOT.'templates'.DS);

define('INCLUDES',TEMPLATES.'includes'.DS);
define('MODULES',TEMPLATES.'modules'.DS);
define('VIEWS',TEMPLATES.'views'.DS);
define('UPLOADS',ROOT.'uploads'.DS);

// para archivos que vayamos a incluir en header o footer (css o js)
define('CSS',URL.'assets/css/');
define('IMG',URL.'assets/img/');
define('JS',URL.'assets/js/');

//personalizacion
define('APP_NAME','Cotizador Poncelet');
define('TAXES_RATE',0);
define('SHIPPING',0);


// cargar las funciones

require_once APP.'functions.php';



?>