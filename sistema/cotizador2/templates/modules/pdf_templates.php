
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cotización</title>

  <style type="text/css">
    * {
      font-family: Verdana, Arial, sans-serif;
    }
    table{
      font-size: x-small;
      border-collapse:collapse;
    }
    tfoot tr td{
      font-weight: bold;
      font-size: x-small;
    }
    .gray {
      background-color: lightgray;
    }

    .success {
      color: green;
    }
  </style>
</head>
<body>
  <!-- Cabecera -->
  <table width="100%" >
    <tr>
      <td valign="top"><img src="" alt="" width="150"/></td>
      <td align="right">
        <h2 style="color:coral"></h2>
        <h3></h3>
        <pre>
          Jhon Doe CEO
          Joystick
          XX101010101
          5512 3465 78
          FAX
        </pre>
      </td>
    </tr>
  </table>

  <!-- Información de la empresa -->

  <table width="100%" border="1">
    <tr>
      <td  style="border:coral;background-color:#ffffad; text-align: right; padding:10px;">Cotizacion #1321564</td>
    </tr>
  </table>

  <table width="100%" border="1">
    <tr>
      <td><strong>De:</strong> Jhon Doe - Joystick</td>
      <td><strong>Para:</strong> </td>
    </tr>
  </table>

  <br/>

  <!-- Resumen de la cotización -->
  <table width="100%" border="1">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th width="40%">Descripción</th>
        <th>Marca</th>
        <th>Precio unitario</th>
        <th>Cantidad</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      
        <tr>
          <th scope="row">1</th>
          <td >Laptop Gamer h-514222</td>
          <td align="center">Dell</td>
          <td align="center">5500 Bs</td>
          <td align="center">1</td>
          <td align="right">5500 Bs</td>
        </tr>
       
    </tbody>
    <tfoot>
      
      <tr>
        <td colspan="5" align="right">Total (Bs)</td>
        <td align="right" class="gray"><h3 style="margin: 0px 0px;">5500 bs</h3></td>
      </tr>
      <tr>
        <td colspan="6" align="right"><?php echo 'Impuestos Incluidos IVA + IT '; ?></td>
      </tr>
      <tr>
        <td colspan="6"></td>
      </tr>
      <tr>
        <td align="right" colspan="4">Garantia:</td>
        <td align="right" colspan="2">1 año</td>
      </tr>
      <tr>
        <td align="right" colspan="4">Lugar de Entrega:</td>
        <td align="right" colspan="2">GAM Tinguipaya</td>
      </tr>
      <tr>
        <td align="right" colspan="4">Validez de Cotizacion:</td>
        <td align="right" colspan="2">10 dias</td>
      </tr>
      <tr>
        <td align="right" colspan="4">Tiempo de Entrega:</td>
        <td align="right" colspan="2">5 dias</td>
      </tr>
      <tr>
        <td  align="left" colspan="6"><img src="sello.png" alt=""></td> 
      </tr>
    </tfoot>
  </table>
</body>
</html>

