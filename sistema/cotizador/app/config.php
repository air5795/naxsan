<?php

session_start();

//para saber si esta en servidor local 

define('IS_LOCAL',in_array($_SERVER['REMOTE_ADDR'],['12.0.0.1','::1']));
//define('IS_REMOTE',in_array($_SERVER['REMOTE_HOST'],['192.168.0.10',':80']));
define('URL',(IS_LOCAL ? 'http://127.0.0.1/poncelet-sis/sistema/cotizador/': ''));



//Rutas para carpetas

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',getcwd().DS);
define('APP',ROOT.'app'.DS);
define('ASSETS',ROOT.'assets'.DS);
define('TEMPLATES',ROOT.'templates'.DS);

define('INCLUDES',TEMPLATES.'includes'.DS);
define('MODULES',TEMPLATES.'modules'.DS);
define('VIEWS',TEMPLATES.'views'.DS);
define('UPLOADS','assets/uploads/');

// para archivos que vayamos a incluir en header o footer (css o js)
define('CSS',URL.'assets/css/');
define('IMG',URL.'assets/img/');
define('JS',URL.'assets/js/');


//personalizacion
define('APP_NAME','Cotizador Poncelet');
define('TAXES_RATE',0.06 );
define('SHIPPING',0);

//autoload composer
//require_once ROOT.'../sistema/pdf/vendor/autoload.php';
require_once ROOT.'vendor/autoload.php';
// cargar las funciones

require_once APP.'functions.php';



?>