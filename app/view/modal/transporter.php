<div class="modal modal-xl flip" id="modalTransporter">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Lista de Transportadores</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row gy-4">
          <table class="table table-bordered dt-responsive nowrap table-striped align-middle"
                 id="transporterTableModal">
            <thead>
            <th>ID</th>
            <th>CNPJ</th>
            <th>Nome</th>
            <th></th>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function generateDatatableTransporterModal() {
    var table = $('#transporterTableModal').DataTable({
      processing: true,
      ordering: true,
      serverSide: false,
      searching: true,
      searcheable: true,
      lengthChange: false,
      scrollX: true,
      autoWidth: false,
      ajax: {
        url: SERVER + "transporter/listingModal",
        type: "POST",
        data: {}
      },
      destroy: true,
      columns: [
        {data: "idtransporter"},
        {data: "document"},
        {data: "name"},
        {data: "options"},
      ],
      order: [[0, "desc"]],
    });
  }
</script>
