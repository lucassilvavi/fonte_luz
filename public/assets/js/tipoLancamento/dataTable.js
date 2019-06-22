$(document).ready(function () {
    $('#tb_tipo_contribuicao').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            order: [1, 'desc'],
            columnDefs: [
                {

                    className: "dt-center",
                    orderable: false,
                    searchable: false,
                    targets: 3
                }
            ],
            buttons: [
                {
                    extend: 'copyHtml5',
                    text: '<i class="fa fa-files-o fa-2x text-info"></i>',
                    titleAttr: 'Copy',
                    exportOptions: {
                        columns: [0, 1, 2,3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o fa-2x text-success"></i>',
                    titleAttr: 'Excel',
                    exportOptions: {
                        columns: [0, 1, 2,3]
                    }

                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="fa fa-file-text-o fa-2x text-primary"></i>',
                    fieldSeparator: ';',
                    titleAttr: 'CSV',
                    exportOptions: {
                        columns: [0, 1, 2,3]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o fa-2x text-danger"></i>',
                    titleAttr: 'PDF',
                    exportOptions: {
                        columns: [0, 1, 2,3]
                    }
                },
                {
                    text: '<li class="fa fa-2x cadLancamento">Incluir Tipo Lançamento</li>',
                    action: function () {
                        $('.cadLancamento').click(modalCadLancamento());
                    }
                }

            ]
        }
    );
});