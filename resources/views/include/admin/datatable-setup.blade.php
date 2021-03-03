{{-- Database Setup --}}
<script>
    $(function () {
        $('#main-table thead th.is-using-setup').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" style="font-size: 13px;" placeholder="Search '+title+'" />' );
    } );
    // Data Tables
    var theTable = $("#main-table").DataTable({
        initComplete: function () {
            this.api().columns().every( function () {
                var that = this;
                var searchTextBoxes = $('input', this.header())
                searchTextBoxes.on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
                searchTextBoxes.on('click', function (event) {
                    event.stopPropagation()
                })
            } );
        },
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#main-table_wrapper .col-md-6:eq(0)');
  });
</script>
