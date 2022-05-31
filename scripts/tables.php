<script>
        $(document).ready(function () {
        $('#example').DataTable({
            autoWidth: false,
            columnDefs: [
                {
                    targets: ['_all'],
                    className: 'mdc-data-table__cell',
                },
            ],
        });
    });
</script>