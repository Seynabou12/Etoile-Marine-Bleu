<script src="{{ asset('js/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src='//cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js'></script>
<script src='//cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js'></script>
<script src='//cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js'></script>
<script src='//cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js'></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#datatable').DataTable( {
        select:true,
        "paging": true,
        "lengthChange": true,
        "language": {
            "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
            "iDisplayLength": 25,
            "lengthMenu": "Affichage par  _MENU_ ",
            "zeroRecords": "Aucune données",
            "info": " ",
            "infoEmpty": "Enregistrements",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Recherche: ",
            "paginate": {
                "previous": "Précédente",
                "next": "Suivante",
                "first": "Première",
                "last": "Dernière"
            }
        },
        dom: 'Bflrtip',
        buttons: [
          {
                extend: 'collection',
                text: '<i class="fa fa-ellipsis-v" aria-hidden="true"></i>',
                buttons: [
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i>',
                        exportOptions: {
                            // columns: ':not(:first-child):not(:last-child)'
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8 , 9, 10 ,11 ,12 , 13, 14, 15, 16,17, 18,19 ,20, 21, 22, 23, 24 ,25, 26 ,27 ]
                        }
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv fa-1x"></i>',
                        exportOptions: {
                            // columns: ':not(:first-child):not(:last-child)'
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8 , 9, 10 ,11 ,12 , 13, 14, 15, 16,17, 18,19 ,20, 21, 22, 23, 24 ,25, 26 ,27 ]

                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel" aria-hidden="true"></i>',
                        exportOptions: {
                            // columns: ':not(:first-child):not(:last-child)'
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8 , 9, 10 ,11 ,12 , 13, 14, 15, 16,17, 18,19 ,20, 21, 22, 23, 24 ,25, 26 ,27 ]
                        }
                    },
                    // 'colvis'
                ]
          }
        ],
        // columnDefs: [ {
        //     targets: -1,
        //     visible: false
        // } ]
    });
} );
</script>
