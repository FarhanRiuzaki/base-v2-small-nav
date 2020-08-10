<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Register At</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($treasury as $val)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $val->amount_sbi }}</td>
            <td>{{ $val->amount_sbn }}</td>
            <td>{{ $val->amount_bni }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
