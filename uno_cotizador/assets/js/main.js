$('document').ready(() =>{
    // notificaciones 
    function notify(content,type = 'success') {
        let wrapper = $('.wrapper_notifications'),
        id          = Math.floor((Math.random()*500)+1),
        notification    = '<div class="alert alert-'+type+'" id="noty_'+id+'">'+content+'</div>',
        time        = 5000;

        // Insertar en el contenedor la notificacion 
        wrapper.append(notification);

        // Timer para ocultar las notificaciones
        setTimeout(function(){
            $('#noty_'+id).remove();
        },time);

        return true;
    }


    // cargar contenido de la cotizaicon
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
        precio_c      = parseFloat($('#precio_unitario_c').val());
        precio_v      = parseFloat($('#precio_unitario_v').val());

        if (concepto.length < 5) {
            notify('Ingresa un concepto valido porfavor.','danger');
            errors++;
        }

        // validar el precio 

        if (precio_c < 10 ) {
            notify('Porfavor ingresa un precio mayor a 10 bs en precio de compra.','danger');
            errors++;
        }

        if (precio_v < 10 ) {
            notify('Porfavor ingresa un precio mayor a 10 bs en precio de venta.','danger');
            errors++;
        }

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
});