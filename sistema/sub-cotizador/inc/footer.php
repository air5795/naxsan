        
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" ></script>
        
        <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>


        




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>









<script>
      // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2({
      placeholder: "Buscar en base de datos (Clientes)",
      allowClear: true , 
      
      language: "es",
  
    });
  
    theme: "classic";
    
});
</script>

<script>
      // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single2').select2({
      placeholder: "Buscar en base de datos (Productos)",
      allowClear: true , 
      
      language: "es",
  
    });
  
    theme: "classic";
    
});
    </script>

<script>
      // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single3').select2({
      placeholder: "Buscar en base de datos (Productos)",
      allowClear: true , 
      
      language: "es",
  
    });
  
    theme: "classic";
    
});
    </script>


<script>
    function alphaOnly(event) {
        var key = event.keyCode;
        return ((key >= 65 && key <= 90) || key == 8);
    };
</script>
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>

       

            window.addEventListener('DOMContentLoaded', event => {
            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                // Uncomment Below to persist sidebar toggle between refreshes
                // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                //     document.body.classList.toggle('sb-sidenav-toggled');
                // }
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                });
            }

            });
        </script>
<style>
    .goog-logo-link {
        display: none !important;
    }

    .goog-te-gadget {
        color: transparent;
    }

    .goog-te-gadget .goog-te-combo {
        margin: 0px 0;
        padding: 8px;
    }

    #google_translate_element {
        padding-top: 14px;
    }
</style>
<footer class="bg-primary text-white text-center text-lg-start fixed-bottom">
    <!-- Grid container -->

    <!-- Grid container -->

    <!-- Copyright -->
    
    <!-- Copyright -->
</footer>
<!--/ Copy this code to have a working example -->

</div>
</div>