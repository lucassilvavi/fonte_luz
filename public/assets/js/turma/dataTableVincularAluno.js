$(document).ready(function () {
    $('#tableVincularAluno').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            paging: false,
            searching: false,
            columnDefs: [
                {

                    className: "dt-center",
                    orderable: false,
                    searchable: false,
                    targets: 1
                }
            ],
            buttons: []
        }
    );
});