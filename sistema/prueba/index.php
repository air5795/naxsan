<form>
  <input type="text" id="nombre" placeholder="Nombre">
  <input type="text" id="celular" placeholder="Celular">
  <button id="guardar">Guardar</button>
</form>

<script>
    document.getElementById("guardar").addEventListener("click", function(event) {
  event.preventDefault();
  var nombre = document.getElementById("nombre").value;
  var celular = document.getElementById("celular").value;
  var datos = {
    'nombre': nombre,
    'celular': celular
  };
  var datos_serializados = JSON.stringify(datos);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "guardar_datos.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert(xhr.responseText);
    }
  };
  xhr.send(datos_serializados);
});
</script>