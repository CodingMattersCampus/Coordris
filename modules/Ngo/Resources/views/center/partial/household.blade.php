<div class="row">
    <table id="household-table" class="table table-responsive table-striped table-hover">
        <thead class="bg-blue-gradient">
        <tr>
            <th>Head of Family</th>
            <th>Spouse</th>
            <th>Members</th>
            <th>Infants/Toddlers</th>
            <th>Elderly</th>
            <th>Rice</th>
            <th>Canned Goods</th>
            <th>Noodles</th>
            <th>Water</th>
        </tr>
        </thead>
    </table>
</div>
@push('js')
    <script type="text/javascript">
        $(function() {
            const householdTable = $('#household-table').DataTable({
                "dom": 'Bfrtip',
                "buttons": ['pageLength', 'csv'],
                "lengthMenu": [[15, 30, 100, -1], [15, 30, 100, "All"]],
                "serverSide": true,
                "deferRender": true,
                "columns": [
                    { "data": "head", "orderable": false, "searchable": true },
                    { "data": "spouse", "orderable": false, "searchable": true },
                    { "data": "total_members", "orderable": false, "searchable": false},
                    { "data": "total_infants", "orderable": false, "searchable": false},
                    { "data": "total_elderly", "orderable": false, "searchable": false},
                    { "data": "rice", "orderable": false, "searchable": false},
                    { "data": "canned_goods", "orderable": false, "searchable": false},
                    { "data": "noodles", "orderable": false, "searchable": false},
                    { "data": "water", "orderable": false, "searchable": false},
                ],
                "ajax": "{{\route('api.center.household.listing', compact('center'))}}"
            });

            setInterval(function() {
                householdTable.ajax.reload();
            }, 5000);
        });
    </script>
@endpush