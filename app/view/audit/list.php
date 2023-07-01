<?php
require_once VIEW . 'header.php';
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Auditorias Cadastradas</h5>
        <div class="flex-shrink-0">
          <a href="<?=HTTP_SERVER?>audit/store" class="btn btn-primary"><i class="ri-add-line"></i> Novo Cadastro </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered dt-responsive nowrap table-striped align-middle" id="auditTable">
          <thead>
          <th>ID</th>
          <th>Descrição</th>
          <th>Status</th>
          <th></th>
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
    var table = $('#auditTable').DataTable({
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
          title: 'Auditorias Cadastradas',
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
        url: SERVER+"audit/listing",
        type: "POST",
        data: {}
      },
      destroy: true,
      columns: [
        {data: "idaudit"},
        {data: "description"},
        {data: "active"},
        {data: "options"},
      ],
      order: [[0, "desc"]],
    });
  }

  function deleteAudit(idAudit) {
    const options = {
      method: 'post',
      url: SERVER + 'audit/delete',
      headers: {
        'Content-Type': 'application/json'
      },
      data: {id: idAudit}
    };

    axios.request(options).then(function (response) {
      const res = response.data;
      alert(res.msg);
      generateDatatable();
    }).catch(function (error) {
      console.log(error);
      alert('Auditoria Não pode ser deletada, verifique se há questões associadas ou auditorias realizadas!');
    });
  }

</script>
