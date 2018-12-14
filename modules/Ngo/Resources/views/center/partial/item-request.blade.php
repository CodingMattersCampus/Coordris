<table id="requested-items-table" class="table table-responsive table-striped table-hover">
    <thead class="bg-blue-gradient">
    <tr>
        <th>Item</th>
        <th>Needed</th>
        <th>Given/Dispatched</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Rice</td>
        <td>{{$center->households()->pluck('rice')->sum()}}</td>
        <td></td>
    </tr>
    <tr>
        <td>Canned Goods</td>
        <td>{{$center->households()->pluck('canned_goods')->sum()}}</td>
        <td></td>
    </tr>
    <tr>
        <td>Noodles</td>
        <td>{{$center->households()->pluck('noodles')->sum()}}</td>
        <td></td>
    </tr>
    <tr>
        <td>Water</td>
        <td>{{$center->households()->pluck('water')->sum()}}</td>
        <td></td>
    </tr>
    </tbody>
</table>