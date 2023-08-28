<?php

require_once 'vendor/autoload.php';
use Dompdf\Dompdf;



function get_view($view_name){
    $view = VIEWS.$view_name.'View.php';
    if (!is_file($view)) {
        die('La vista no existe');
    }

    // Existe la vista
    require_once $view; 
}

// cotizacion 
// new_quote[]
/**
 * number
 * name
 * company
 * email
 * items[]
 * subtotal
 * taxes
 * shiping
 * total

 */

 /**
  * item
  * id
  * concept
  * type
  * cuantity
  * price
  * taxes
  * total
  */

  /**
   * get_quoute()
   * get_items()
   * get_items($id)
   * add_item($item)
   * delete_item($id)
   * delete_items()
   * restart_quote()
   */


function get_quote(){
    if (!isset($_SESSION['new_quote'])) {
        return $_SESSION['new_quote'] =
        [
            'number'        => rand(111111, 999999),
            'name'          => '',
            'company'       => '',
            'email'         => '',
            'garantia'      => '',
            'valides'       => '',
            'entrega'       => '',
            'items'         => [],
            'subtotal'      => 0,
            'taxes'         => 0,
            'shipping'      => 0,
            'total'         => 0,
            'subtotal_c'    => 0, // 
            'total_c'       => 0,  //

            'envio'       => 0,
            'total_g'       => 0 //
             
            
        ];
    }
    // recalcular los totales
    recalculate_quote();
    return $_SESSION['new_quote'];

   }

   function set_client($client) {
    $_SESSION['new_quote']['name']      = trim($client['nombre']);
    $_SESSION['new_quote']['company']   = trim($client['empresa']);
    $_SESSION['new_quote']['email']     = trim($client['email']);
    $_SESSION['new_quote']['garantia']  = trim($client['garantia']);
    $_SESSION['new_quote']['valides']   = trim($client['valides']);
    $_SESSION['new_quote']['entrega']   = trim($client['entrega']);
    return true;
  }
 

function recalculate_quote(){
    $items      =[]; //array vacio
    $subtotal   =0;
    $taxes      =0; // inpuestos
    $shipping   =0; // envio
    $total      =0;
    $subtotal_c =0;
    $total_g = 0;
    $envio =0;

    if (!isset($_SESSION['new_quote'])) {
        return false;
    }

    //validar Items
    $items = $_SESSION['new_quote']['items'];

    // si la lista de items esta vacia no es necesario calcular nada

    if (!empty($items)) {
        foreach ($items as $item) {
            $subtotal += $item['total'];
            $subtotal_c += $item['total_c'];
            $taxes    += $item['taxes'];
            $shipping = $item['shipping'];
        }
    }

    
    $total    = $subtotal + $taxes + $shipping;
    $total_c    = $subtotal_c ;
    $total_g  = $subtotal_c + $taxes + $shipping;

    $_SESSION['new_quote']['subtotal'] = $subtotal;
    $_SESSION['new_quote']['subtotal_c'] = $subtotal_c;
    $_SESSION['new_quote']['taxes'] = $taxes;
    $_SESSION['new_quote']['total'] = $total;
    $_SESSION['new_quote']['total_c'] = $total_c;
    $_SESSION['new_quote']['total_g'] = $total_g;
    $_SESSION['new_quote']['shipping'] = $shipping;

    return true;

   }

function restart_quote(){
    $_SESSION['new_quote'] =
    [
        'number'        => rand(111111, 999999),
        'name'          => '',
        'company'       => '',
        'email'         => '',
        'items'         => [],
        'subtotal'      => 0,
        'taxes'         => 0,
        'shipping'      => 0,
        'total'         => 0
        
    ];
        return true;
    }

function get_items(){
        $items = [];
        
        //si no existe la cotizacion y esta vacio el array 

        if (!isset($_SESSION['new_quote']['items'])) {
            return $items;
        }

        // la cotizacion existe, se asigana el valor

        $items = $_SESSION['new_quote']['items'];
        return $items;
    }

function get_item($id){
        $items = get_items();
        
        //si no hay items 
        if (empty($items)) {
            return false;
        }

        // si hay items iteramos
        foreach ($items as $item){
            // validar si existe con el id pasado 
            if($item['id'] === $id){
                return $item;
            }
        }

        //no hubo un match o resultados

        return false;
   }

function delete_items(){
        $_SESSION['new_quote']['items'] = [];

        recalculate_quote();

        return true;
    }

function delete_item($id){
        $items = get_items();
        
        //si no existe items 
        if (empty($items)) {
            return false;
        }

        // si hay items iteramos
        foreach ($items as $i => $item){
            // validar si existe con el id pasado 
            if($item['id'] === $id){
                unset($_SESSION['new_quote']['items'][$i]);
                return true;
            }
        }

        //no hubo un match o resultados

        return false;
    }
function add_item($item){
        $items = get_items();

        // si existe el id ya en nuestros items
        // podemos actualizar la informacion en lugar de agregarlo

        if (get_item($item['id']) !== false) {
            foreach ($items as $i => $e_item) {
                if ($item['id'] === $e_item['id']) {        
                $_SESSION['new_quote']['items'][$i] = $item;
                return true;
                }   
            }
        }

        // no existe en la lista, se agrega simplemente

        $_SESSION['new_quote']['items'][] = $item;
        return true;





    }
    
function json_build($status = 200, $data = [], $msg =""){
        if (empty($msg) || $msg == '') {
            switch ($status){

            
            case 200:
            $msg = 'OK';
            break;
            case 201:
            $msg = 'Created';
            break;
            case 400:
            $msg = 'Invalid Request';
            break;
            case 403:
            $msg = 'Acceso denegado';
            break;

            case 404:
            $msg = 'Not Found';
            break;

            case 500:
            $msg = 'Internal Server Error';
            break;
            case 505:
            $msg = 'Permiso denegado';
            break;
            
            default;
            break;
        }
    }

        $json = [
            'status' => $status,
            'data' => $data,
            'msg' => $msg

        ];

            return json_encode($json);
        

        }

function json_output($json){
    header ('Access-Control-Allow-Origin: *');
    header ('Content-type: application/json;charset=utf-8');

    if (is_array($json)) {
        $json = json_encode($json);

    }

    echo $json;

    exit();
 }

function hook_mi_funcion(){
    echo 'hola';
 }
function get_module($view, $data = []){
    $view = $view.'.php';
    if (!is_file($view)) {
        return false;
    }

    $d= $data = json_decode(json_encode($data));

    ob_start();
    require_once $view;
    $output = ob_get_clean();
    return $output;
 }

function hook_get_quote_res(){
    // cargar la cotizacion
    $quote = get_quote();
    $html = get_module(MODULES.'quote_table', $quote);

    json_output(json_build(200,['quote' => $quote, 'html' => $html]));
 }




// Agregar Concepto
function hook_add_to_quote(){
    // validar 
    if (!isset($_POST['concepto'],$_POST['tipo'],$_POST['precio_unitario'],$_POST['cantidad'],$_POST['marca'])) {
        json_output(json_build(403,null,'Parametros incompletos.'));
    }

    $concept                    =   trim($_POST['concepto']);
    $marca                      =   trim($_POST['marca']);
    $type                       =   trim($_POST['tipo']);
    $price                      =   (float) str_replace([',','$'],'', $_POST['precio_unitario']);
    $price_c                    =   (float) str_replace([',','$'],'', $_POST['precio_unitario_c']);
    $shipping                   =   (float) str_replace([',','$'],'', $_POST['envio']);
    $quantity                   =   (int) trim($_POST['cantidad']);
    $subtotal                   =   (float) $price * $quantity;
    $subtotal_c                 =   (float) $price_c * $quantity;
    $taxes                      =   (float) $subtotal * TAXES_RATE ;
    $total_g                    =   (float) $subtotal_c + $taxes  ; 

    $item = 
    [
        'id'                    => rand(1111, 9999),
        'concept'               => $concept,
        'marca'                 => $marca,
        'type'                  => $type,
        'quantity'              => $quantity,
        'shipping'              => $shipping,
        'price'                 => $price,
        'price_c'               => $price_c,
        'taxes'                 => $taxes,
        'total'                 => $subtotal,
        'total_c'               => $subtotal_c,
        'total_g'               => $total_g
    ];

    

    if(!add_item($item)){
        json_output(json_build(400,null,'Hubo un problema al guardar el concepto en la cotizacion '));
        
    }

    json_output(json_build(201,get_item($item['id']),'Concepto agregado con exito '));
    


}

// Reinciar la cotización
function hook_restart_quote() {
    $items = get_items();
  
    if(empty($items)) {
      json_output(json_build(400, null, 'No es necesario reiniciar la cotización, no hay conceptos en ella.'));
    }
  
    if(!restart_quote()) {
      json_output(json_build(400, null, 'Hubo un problema al reiniciar la cotización.'));
    }
  
    json_output(json_build(200, get_quote(), 'La cotización se ha reiniciado con éxito.'));
  }


  // Borrar un concepto de la cotización
function hook_delete_concept() {
    if(!isset($_POST['id'])) {
      json_output(json_build(403, null, 'Parametros incompletos.'));
    }
  
    if(!delete_item((int) $_POST['id'])) {
      json_output(json_build(400, null, 'Hubo un problema al borrar el concepto.'));
    }
  
    json_output(json_build(200, get_quote(), 'Concepto borrado con éxito.'));
  }
  
  // Cargar un concepto para editar
  function hook_edit_concept() {
    if(!isset($_POST['id'])) {
      json_output(json_build(403, null, 'Parametros incompletos.'));
    }
  
    if(!$item = get_item((int) $_POST['id'])) {
      json_output(json_build(400, null, 'Hubo un problema al cargar el concepto.'));
    }
  
    json_output(json_build(200, $item, 'Concepto cargado con éxito.'));
  }


  // Guardar los cambios de un concepto
function hook_save_concept() {
    // Validar
    if(!isset($_POST['id_concepto'], $_POST['concepto'], $_POST['tipo'], $_POST['precio_unitario'], $_POST['cantidad'], $_POST['precio_unitario_c'], $_POST['marca'])) {
      json_output(json_build(403, null, 'Parametros incompletos.'));
    }
  
    $id       = (int) $_POST['id_concepto'];
    $concept  = trim($_POST['concepto']);
    $marca    = trim($_POST['marca']);
    $shipping    = (float) str_replace([',','$'],'', $_POST['envio']);
    $type     = trim($_POST['tipo']);
    $price    = (float) str_replace([',','Bs '], '', $_POST['precio_unitario']);
    $price_c    = (float) str_replace([',','Bs '], '', $_POST['precio_unitario_c']);
    $quantity = (int) trim($_POST['cantidad']);
    $subtotal = (float) $price * $quantity;
    $subtotal_c = (float) $price_c * $quantity;
    $taxes    = (float) $subtotal * TAXES_RATE;
    $total_g  = (float) $subtotal_c + $taxes + $shipping ;
  
    $item = 
    [
      'id'       => $id,
      'concept'  => $concept,
      'marca'    => $marca,
      'type'     => $type,
      'shipping' => $shipping,
      'quantity' => $quantity,
      'price'    => $price,
      'price_c'  => $price_c,
      'taxes'    => $taxes,
      'total'    => $subtotal,
      'total_c'  => $subtotal_c,
      'total_g'  => $total_g
    ];
  
    if(!add_item($item)) {
      json_output(json_build(400, null, 'Hubo un problema al guardar los cambios del concepto.'));
    }
  
    json_output(json_build(200, get_item($id), 'Cambios guardados con éxito.'));
  }

// Generar un pdf 1
function generate_pdf($filename = null, $html, $save_to_file = true) {
    // Nombre del archivo
    $filename = $filename === null ? time().'.pdf' : $filename.'.pdf';
  
    // Instancia de la clase
    $pdf = new Dompdf();
  
    // Formato
    $pdf->setPaper('A4');
  
    // Contenido
    $pdf->loadHtml($html);
    $pdf->render();
  
    if($save_to_file) {
      $output = $pdf->output();
      file_put_contents($filename, $output);
      return true;
    }
  
    $pdf->stream($filename);
    return true;
  }




  
  // Crear el pdf de la cotización
function hook_generate_quote() {
    // Validar
    if(!isset($_POST['nombre'], $_POST['empresa'], $_POST['email'], $_POST['garantia'], $_POST['valides'], $_POST['entrega'])) {
      json_output(json_build(403, null, 'Parametros incompletos.'));
    }
  
    // Validar correo
    //if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      //json_output(json_build(400, null, 'Dirección de correo no válida.'));
    //}
    
    // Guardar información del cliente
    $client = 
    [
      'nombre'  => $_POST['nombre'],
      'empresa' => $_POST['empresa'],
      'email'   => $_POST['email'],
      'garantia'   => $_POST['garantia'],
      'valides'   => $_POST['valides'],
      'entrega'   => $_POST['entrega']
    ];
    set_client($client);
  
    // Cargar cotización
    $quote    = get_quote();
  
    if(empty($quote['items'])) {
      json_output(json_build(400, null, 'No hay conceptos en la cotización.'));
    }
  
    $module       = MODULES.'pdf_template';
    $html         = get_module($module, $quote);
    $filename     = 'coty_'.$quote['number'];
    //$download     = URL.UPLOADS.$filename;
    $download     = sprintf(URL.'pdf.php?number=%s', $quote['number']); // pdf.php?number=123456
    $quote['url'] = $download;
  
    // Generar pdf y guardarlo en servidor
    if(!generate_pdf(UPLOADS.$filename, $html)) {
      json_output(json_build(400, null, 'Hubo un problema al generar la cotización.'));
    }
  
    json_output(json_build(200, $quote, 'Cotización generada con éxito.'));
  }

  // Cargar todas las cotizaciones
function get_all_quotes() {
    return $quotes = glob(UPLOADS.'coty_*.pdf');
  }
  
  // Redirección
  function redirect($route) {
    header(sprintf('Location: %s', $route));
    exit;
  }









    // Crear el pdf de la cotización 2
function hook_generate_quote2() {
  // Validar
  if(!isset($_POST['nombre'], $_POST['empresa'], $_POST['email'], $_POST['garantia'], $_POST['valides'], $_POST['entrega'])) {
    json_output(json_build(403, null, 'Parametros incompletos.'));
  }

  // Validar correo
  //if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    //json_output(json_build(400, null, 'Dirección de correo no válida.'));
  //}
  
  // Guardar información del cliente
  $client = 
  [
    'nombre'  => $_POST['nombre'],
    'empresa' => $_POST['empresa'],
    'email'   => $_POST['email'],
    'garantia'   => $_POST['garantia'],
    'valides'   => $_POST['valides'],
    'entrega'   => $_POST['entrega']
  ];
  set_client($client);

  // Cargar cotización
  $quote    = get_quote();

  if(empty($quote['items'])) {
    json_output(json_build(400, null, 'No hay conceptos en la cotización.'));
  }

  $module       = MODULES.'pdf_template2';
  $html         = get_module($module, $quote);
  $filename     = 'coty_'.$quote['number'];
  //$download     = URL.UPLOADS.$filename;
  $download     = sprintf(URL.'pdf.php?number=%s', $quote['number']); // pdf.php?number=123456
  $quote['url'] = $download;

  // Generar pdf y guardarlo en servidor
  if(!generate_pdf(UPLOADS.$filename, $html)) {
    json_output(json_build(400, null, 'Hubo un problema al generar la cotización.'));
  }

  json_output(json_build(200, $quote, 'Cotización generada con éxito.'));
}

// Cargar todas las cotizaciones
function get_all_quotes2() {
  return $quotes = glob(UPLOADS.'coty_*.pdf');
}

// Redirección
function redirect2($route) {
  header(sprintf('Location: %s', $route));
  exit;
}
  
?>

