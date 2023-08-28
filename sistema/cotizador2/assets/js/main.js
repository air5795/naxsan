$('document').ready(() =>{
  // notificaciones 

  
  
function notify(content,type = 'success') {
      let wrapper = $('.wrapper_notifications'),
      id          = Math.floor((Math.random()*500)+1),
      notification    = '<div class="alert alert-'+type+'" id="noty_'+id+'">'+content+'</div>',
      time        = 1000;

      // Insertar en el contenedor la notificacion 
      wrapper.append(notification);

      // Timer para ocultar las notificaciones
      setTimeout(function(){
          $('#noty_'+id).remove();
      },time);

      return true;
  }

  

  // cargar contenido de la cotizacion
function get_quote(){
      let wrapper = $('.wrapper_quote'),
      action      = 'get_quote_res';
      

      $.ajax({
          url:'ajax.php',
          type: 'get',
          cache: false,
          dataType:'json',
          data:{action},
          beforeSend: function(){
              wrapper.waitMe();
          }
      }).done(res =>{
          if (res.status === 200) {
              
              wrapper.html(res.data.html);
          }else{
              
              wrapper.html(res.msg);
          }

      }).fail(err =>{
          wrapper.html('Ocurrio un Error, recarga la pagina ....');
      }).always(() =>{
          wrapper.waitMe('hide');
      });
  }
  get_quote();

  

  // funcion para agregar un concepto a la cotizacion 
  $('#add_to_quote').on('submit',add_to_quote);
function add_to_quote(e){
      e.preventDefault();
      
      let form    = $('#add_to_quote'),
          action  = 'add_to_quote',
          data    = new FormData(form.get(0)),
          errors  = 0;


      // agregar la accion al objeto data
      data.append('action',action);

      // validar el concepto

      let concepto = $('#concepto').val(),
      precio      = parseFloat($('#precio_unitario').val());
      precio_c    = parseFloat($('#precio_unitario_c').val());

      if (concepto.length < 5) {
          notify('Ingresa un concepto valido porfavor.','danger');
          errors++;
      }

      // validar el precio 

     // if (precio < 10 ) {
     //     notify('Porfavor ingresa un precio mayor a 10.','danger');
     //     errors++;
     // }


      if (errors > 0) {
          notify('Complete el formulario.','danger');
          return false;
      }

      $.ajax({
          url         :'ajax.php',
          type        :'POST',
          dataType    :'json',
          cache       : false,
          processData : false,
          contentType : false,
          data        : data,
          beforeSend: () => {
              form.waitMe();
          }
      }).done(res =>{
          if (res.status === 201) {
              notify(res.msg);
              form.trigger('reset');
              get_quote();
          } else{
              notify (res.msg,'danger');
          }
      }).fail(err =>{
          notify('Hubo un problema con la peticion, intenta de nuevo.','danger');
          form.trigger('reset');
      }).always(() =>{
          form.waitMe('hide');
      })




  }


// Funcion para reiniciar la cotizacin
$('.restart_quote').on('click', restart_quote);
function restart_quote(e) {
  e.preventDefault();

  let button = $(this),
  action     = 'restart_quote',
  download   = $('#download_quote'),
  generate   = $('#generate_quote'),
  default_text = 'Generar Cotizacion';

  if(!confirm('¿Estas seguro?')) return false;

  // Petición
  $.ajax({
    url     : 'ajax.php',
    type    : 'post',
    dataType: 'json',
    data    : {action}
  }).done(res => {
    if(res.status === 200) {
      download.fadeOut();
      download.attr('href','');
      generate.html(default_text);
      notify(res.msg);
      get_quote();
    } else {
      notify(res.msg, 'danger');
    }
  }).fail(err => {
    notify('Hubo un problema con la peticion.', 'danger');
  }).always(() => {

  });
}

// Función para borrar un concepto
$('body').on('click', '.delete_concept', delete_concept);
function delete_concept(e) {
  e.preventDefault();

  let button = $(this),
  id         = button.data('id'),
  action     = 'delete_concept';

  if(!confirm('¿Estás seguro?')) return false;

  // Petición
  $.ajax({
    url     : 'ajax.php',
    type    : 'post',
    dataType: 'json',
    data    : {action, id},
    beforeSend: () => {
      $('body').waitMe();
    }
  }).done(res => {
    if(res.status === 200) {
      notify(res.msg);
      get_quote();
    } else {
      notify(res.msg, 'danger');
    }
  }).fail(err => {
    notify('Hubo un problema con la petición.', 'danger');
  }).always(() => {
    $('body').waitMe('hide');
  });
}

  // Función cargar un sólo concepto
  $('body').on('click', '.edit_concept', edit_concept);
  function edit_concept(e) {
    e.preventDefault();

    let button             = $(this),
    id                     = button.data('id'),
    action                 = 'edit_concept',
    wrapper_update_concept = $('.wrapper_update_concept'),
    form_update_concept    = $('#save_concept');

    // Petición ajax
    $.ajax({
      url     : 'ajax.php',
      type    : 'post',
      dataType: 'json',
      data    : {action, id},
      beforeSend: () => {
        $('body').waitMe();
      }
    }).done(res =>  {
      if(res.status === 200) {
        $('#id_concepto', form_update_concept).val(res.data.id);
        $('#concepto', form_update_concept).val(res.data.concept);
        $('#envio', form_update_concept).val(res.data.shipping);

        $('#marca', form_update_concept).val(res.data.marca);
        $('#tipo option[value="'+res.data.type+'"]', form_update_concept).attr('selected', true);
        $('#cantidad', form_update_concept).val(res.data.quantity);
        $('#precio_unitario', form_update_concept).val(res.data.price);
        $('#precio_unitario_c', form_update_concept).val(res.data.price_c);
        
        wrapper_update_concept.fadeIn();
        //notify(res.msg);
      } else {
        notify(res.msg, 'danger');
      }
    }).fail(err => {
      notify('Hubo un problema con la petición.', 'danger');
    }).always(() => {
      $('body').waitMe('hide');
    });
  }



  // Función guardar cambios de concepto editado
$('#save_concept').on('submit', save_concept);
function save_concept(e) {
  e.preventDefault();

  let form               = $('#save_concept'),
  action                 = 'save_concept',
  data                   = new FormData(form.get(0)),
  wrapper_update_concept = $('.wrapper_update_concept'),
  errors                 = 0;
  
  // Agregar la acción al objeto data
  data.append('action', action);

  // Validar el concepto
  let concepto = $('#concepto', form).val(),
  precio       = parseFloat($('#precio_unitario', form).val());


  

  if(errors > 0) {
    notify('Completa el formulario.', 'danger');
    return false;
  }

  $.ajax({
    url        : 'ajax.php',
    type       : 'POST',
    dataType   : 'json',
    cache      : false,
    processData: false,
    contentType: false,
    data       : data,
    beforeSend: () => {
      form.waitMe();
      $('#exampleModal').modal('hide');
    }
  }).done(res => {
    if(res.status === 200) {
      wrapper_update_concept.fadeOut();
      form.trigger('reset');
      notify(res.msg);
      get_quote();
    } else {
      notify(res.msg, 'danger');
    }
  }).fail(err => {
    notify('Hubo un problema con la petición, intenta de nuevo.', 'danger');
    wrapper_update_concept.fadeOut();
    form.trigger('reset');
  }).always(() => {
    form.waitMe('hide');
  })
}






























// Hide edit box ocultar despues de cancelar la edicion
$('#cancel_edit').on('click', (e) => {
  e.preventDefault();

  let button = $(this),
  wrapper    = $('.wrapper_update_concept'),
  form       = $('#save_concept');

  wrapper.fadeOut();
  form.trigger('reset');
});




$('#generate_quote').click(function(e){
  var registerForm = $("#mandar");
  var formData = registerForm.serializeArray();

  // Convertir los datos en un objeto JSON
  var jsonForm = JSON.stringify(formData);

  console.log(formData);

  //peticion

  $.ajax({
    url     : 'test.php',
    type    : 'POST',
    dataType: 'json',
    cache   : false,
    data: { formData: jsonForm },
    beforeSend: () => {
      //$('body').waitMe();
      //button.html('Generando...');
    }
  })

});






  // Función para generar la cotización
  $('#generate_quote').on('click', generate_quote);
  function generate_quote(e) {
    e.preventDefault();

    let button   = $(this),
    default_text = button.html(), // "Generar"
    new_text     = 'Volver a generar Cotizacion',
    download     = $('#download_quote'),
    nombre       = $('#nombre').val(),
    empresa      = $('#empresa').val(),
    email        = $('#email').val(),
    garantia     = $('#garantia').val(),
    valides      = $('#valides').val(),
    entrega      = $('#entrega').val(),
    action       = 'generate_quote',
    errors       = 0;

    // Validando la acción
    if(!confirm('¿Estás seguro?')) return false;

    // Validando la información
    if(nombre.length < 3) {
      notify('Ingresa un nombre para el cliente por favor', 'danger');
      errors++;
    }

    //if(empresa.length < 0) {
    //  notify('Ingresa una empresa válida por favor', 'danger');
    //  errors++;
    //}

    

    if(errors > 0) {
      return false;
    }

    // Petición
    $.ajax({
      url     : 'ajax.php',
      type    : 'POST',
      dataType: 'json',
      cache   : false,
      data    : {action, nombre, empresa, email,garantia,valides,entrega},
      beforeSend: () => {
        $('body').waitMe();
        button.html('Generando...');
      }
    }).done(res => {
      if(res.status === 200) {
        notify(res.msg);
        download.attr('href', res.data.url);
        download.fadeIn();
        //send.attr('data-number', res.data.number);
        //send.fadeIn();
        button.html(new_text);
      } else {
        notify(res.msg, 'danger');
        download.attr('href', '');
        download.fadeOut();
        //send.attr('data-number', '');
        //send.fadeOut();
        button.html('Reintentar');
      }
    }).fail(err => {
      notify('Hubo un problema con la petición, intenta de nuevo.', 'danger');
      button.html(default_text);
    }).always(() => {
      $('body').waitMe('hide');
    });
  }











  // Función para generar la cotización
  $('#generate_quote2').on('click', generate_quote2);
  function generate_quote2(e) {
    e.preventDefault();

    let button   = $(this),
    default_text = button.html(), // "Generar"
    new_text     = 'Volver a generar respaldo',
    download     = $('#download_quote'),
    nombre       = $('#nombre').val(),
    empresa      = $('#empresa').val(),
    email        = $('#email').val(),
    garantia     = $('#garantia').val(),
    valides      = $('#valides').val(),
    entrega      = $('#entrega').val(),
    action       = 'generate_quote2',
    errors       = 0;

    // Validando la acción
    if(!confirm('¿Estás seguro?')) return false;

    // Validando la información
    if(nombre.length < 3) {
      notify('Ingresa un nombre para el cliente por favor', 'danger');
      errors++;
    }

    //if(empresa.length < 0) {
    //  notify('Ingresa una empresa válida por favor', 'danger');
    //  errors++;
    //}

    

    if(errors > 0) {
      return false;
    }

    // Petición
    $.ajax({
      url     : 'ajax.php',
      type    : 'POST',
      dataType: 'json',
      cache   : false,
      data    : {action, nombre, empresa, email, garantia, valides, entrega},
      beforeSend: () => {
        $('body').waitMe();
        button.html('Generando...');
      }
    }).done(res => {
      if(res.status === 200) {
        notify(res.msg);
        download.attr('href', res.data.url);
        download.fadeIn();
        //send.attr('data-number', res.data.number);
        //send.fadeIn();
        button.html(new_text);
      } else {
        notify(res.msg, 'danger');
        download.attr('href', '');
        download.fadeOut();
        //send.attr('data-number', '');
        //send.fadeOut();
        button.html('Reintentar');
      }
    }).fail(err => {
      notify('Hubo un problema con la petición, intenta de nuevo.', 'danger');
      button.html(default_text);
    }).always(() => {
      $('body').waitMe('hide');
    });
  }
});