<?php
require_once VIEW . 'header.php';
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Perfil</h5>
      </div>
      <div style="margin-left: auto; margin-right: 18px; margin-top: 6px;">
        <a href="<?=HTTP_SERVER?>profile/store" class="btn btn-primary">
          Novo Cadastro
        </a>
      </div>
      <div class="card-body">
        <table class="table table-bordered dt-responsive nowrap table-striped align-middle" id="profileTable">
          <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>Ativo</th>
            <th>Opções</th>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
require_once VIEW . 'footer.php';
?>

<script>
  generateDatatable();

  function generateDatatable() {
    var table = $('#profileTable').DataTable({
      processing: true,
      ordering: true,
      serverSide: false,
      searching: true,
      searcheable: true,
      lengthChange: false,
      scrollX: true,
      autoWidth: false,
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'print',
          text: 'Imprimir',
          autoPrint: false,
          title: 'Lista de Perfil',
          customize: function ( win ) {
            $(win.document.body)
              .css( 'font-size', '10pt' )
              .prepend(
                '<img src="<?=DIR_GALERIA?>logo.png" style="position:absolute; top:0; left:0;" />'
              );

            $(win.document.body).find( 'h1' )
              .css({'font-size':'18pt', 'margin':'48px 0 0 30px', 'text-align':'center'});

            $(win.document.body).find( 'table' )
              .addClass( 'compact' )
              .css( 'font-size', 'inherit' );
          }
        },
        {
          extend: 'csv',
          text: 'Gerar Excel',
          autoPrint: true,
          orientation: 'landscape'
        }
      ],
      ajax: {
        url: SERVER+"profile/listing",
        type: "POST",
        data: {}
      },
      destroy: true,
      columns: [
        {data: "idprofile"},
        {data: "name"},
        {data: "active"},
        {data: "options"},
      ],
      order: [[0, "desc"]],
    });
  }

</script>
