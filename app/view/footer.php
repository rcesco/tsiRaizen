</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->

<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <script>document.write(new Date().getFullYear())</script>
        © TSI.
      </div>
      <div class="col-sm-6">
        <div class="text-sm-end d-none d-sm-block">
          Design & Develop by Aconittus ©
        </div>
      </div>
    </div>
  </div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
  <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!--preloader-->
<div id="preloader">
  <div id="status">
    <div class="spinner-border text-primary avatar-sm" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
</div>

<!-- JAVASCRIPT -->
<script src="<?= DIR_ASSETS ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= DIR_ASSETS ?>libs/simplebar/simplebar.min.js"></script>
<script src="<?= DIR_ASSETS ?>libs/node-waves/waves.min.js"></script>
<script src="<?= DIR_ASSETS ?>libs/feather-icons/feather.min.js"></script>
<script src="<?= DIR_ASSETS ?>js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= DIR_ASSETS ?>js/plugins.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!--datatable js-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


<script>
  const SERVER = "http://localhost:8080/";

  $($.fn.dataTable.tables(true)).DataTable()
    .columns.adjust();

  $.extend($.fn.dataTable.defaults, {
    language: {
      processing: "Carregando...",
      loading: "Carregando...",
      search: 'Pesquisar:',
      paginate: {
        first:      "Primeira",
        last:       "Última",
        next:       "Próxima",
        previous:   "Anterior"
      },
      emptyTable:     "Não há Registros",
      info:           "Mostrando _START_ a _END_ de _TOTAL_ totais",
      infoEmpty:      "Mostrando 0 a 0 de 0 totais",
      infoFiltered:   "(Filtrando de _MAX_ totais)",
    }
  });

  $.extend( $.fn.dataTableExt.oSort, {
    "numeric-comma-pre": function ( a ) {
      var x = (a == "-") ? 0 : a.replace( /,/, "." );
      return parseFloat( x );
    },

    "numeric-comma-asc": function ( a, b ) {
      return ((a < b) ? -1 : ((a > b) ? 1 : 0));
    },

    "numeric-comma-desc": function ( a, b ) {
      return ((a < b) ? 1 : ((a > b) ? -1 : 0));
    }
  } );

  $.extend( $.fn.dataTableExt.oSort, {
    "date-eu-pre": function ( date ) {
      date = date.replace(" ", "");

      if ( ! date ) {
        return 0;
      }

      var year;
      var eu_date = date.split(/[\.\-\/]/);

      /*year (optional)*/
      if ( eu_date[2] ) {
        year = eu_date[2];
      }
      else {
        year = 0;
      }

      /*month*/
      var month = eu_date[1];
      if ( month.length == 1 ) {
        month = 0+month;
      }

      /*day*/
      var day = eu_date[0];
      if ( day.length == 1 ) {
        day = 0+day;
      }

      return (year + month + day) * 1;
    },

    "date-eu-asc": function ( a, b ) {
      return ((a < b) ? -1 : ((a > b) ? 1 : 0));
    },

    "date-eu-desc": function ( a, b ) {
      return ((a < b) ? 1 : ((a > b) ? -1 : 0));
    }
  } );

  $.extend( $.fn.dataTableExt.oSort, {
    "date-euro-pre": function ( a ) {
      var x;

      if ( a.trim() !== '' ) {
        var frDatea = a.trim().split(' ');
        var frTimea = (undefined != frDatea[1]) ? frDatea[1].split(':') : ['00','00','00'];
        var frDatea2 = frDatea[0].split('/');
        x = (frDatea2[2] + frDatea2[1] + frDatea2[0] + frTimea[0] + frTimea[1] + ((undefined != frTimea[2]) ? frTimea[2] : 0)) * 1;
      }
      else {
        x = Infinity;
      }
      return x;
    },

    "date-euro-asc": function ( a, b ) {
      return a - b;
    },

    "date-euro-desc": function ( a, b ) {
      return b - a;
    }
  } );
</script>

<!-- App js -->
<script src="<?= DIR_ASSETS ?>js/app.js"></script>
</body>

</html>