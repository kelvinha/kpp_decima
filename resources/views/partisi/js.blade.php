<script src="{{asset('vendor')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('vendor')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="{{asset('vendor')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('vendor')}}/dist/js/adminlte.js"></script>

@yield('js')
<!- OPTIONAL SCRIPTS -->
<script src="{{asset('vendor')}}/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('vendor')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('vendor')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('vendor')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('vendor')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('vendor')}}/plugins/chart.js/Chart.min.js"></script>
<script>
    $( document ).ready(function() {
    // console.log( "ready!" );
    $('#delete').on('shown.bs.modal',function (e){
        var btn = $(e.relatedTarget);
        var id = btn.data('myid');
        var modal = $(this);
        modal.find('.modal-body #idnpwp').val(id);
        // console.log( id );
        });
    });
</script>
{{-- <script>
    function myFunction(x) {
      if (x.matches) { // If media query matches
        // document.body.style.backgroundColor = "yellow";
        console.log('layar Kecil');
        $('#example1').addClass("table-responsive")
      } else {
        console.log('layar Besar');
        $('#example1').removeClass("table-responsive")
        // document.body.style.backgroundColor = "pink";
      }
    }
    
    var x = window.matchMedia("(max-width: 767px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction) // Attach listener function on state changes
</script> --}}