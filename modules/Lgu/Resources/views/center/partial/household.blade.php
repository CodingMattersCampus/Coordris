<div class="row">
    <div class="col-md-3">
        <form method = "POST" action = "{{route('household.register', compact('center'))}}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger text-xs">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="head">Head of the Family:</label>
                <input class="form-control" type="text" name="head" id="head" placeholder="Name"/>
            </div>
            <div class="form-group">
                <label for="spouse">Spouse: <small class="text-light">(Leave blank if single parent)</small></label>
                <input class="form-control" type="text" name="spouse" id="spouse" placeholder="Name"/>
            </div>
            <fieldset>
                <legend class="text-center">Dependents</legend>
                <div class="form-group">
                    <label for="child">Name of First Child:</label>
                    <input class="form-control" type="text" name="child" id="child" placeholder="Name"/>
                </div>
                <div class="form-group">
                    <label for="child2">Name of Second Child:</label>
                    <input class="form-control" type="text" name="child2" id="child2" placeholder="Name"/>
                </div>
            </fieldset>
            <fieldset>
                <legend class="text-center">Extended Members</legend>
                <div class="form-group">
                    <label for="dependent1">Name of Depedendent:</label>
                    <input class="form-control" type="text" name="dependent1" id="dependent1" placeholder="Name"/>
                </div>
                <div class="form-group">
                    <label for="dependent2">Name of Dependent:</label>
                    <input class="form-control" type="text" name="dependent2" id="dependent2" placeholder="Name"/>
                </div>
            </fieldset>
            <div class="form-group">
                <button class="btn btn-block btn-primary"> Register </button>
            </div>
        </form>
    </div>
    <div class="col-md-9">
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