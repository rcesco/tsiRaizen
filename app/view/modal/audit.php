<div class="modal modal-xl flip" id="modalAudit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Lista de Checklists de Auditoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row gy-4">
          <table class="table table-bordered dt-responsive nowrap table-striped align-middle"
                 id="auditTableModal">
            <thead>
            <th>ID</th>
            <th>Descrição</th>
            <th></th>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function generateDatatableAuditModal() {
    var table = $('#auditTableModal').DataTable({
      processing: true,
      ordering: true,
      serverSide: false,
      searching: true,
      searcheable: true,
      lengthChange: false,
      scrollX: true,
      autoWidth: false,
      ajax: {
        url: SERVER + "audit/listingModal",
        type: "POST",
        data: {}
      },
      destroy: true,
      columns: [
        {data: "idaudit"},
        {data: "description"},
        {data: "options"},
      ],
      order: [[0, "desc"]],
    });
  }
</script>
