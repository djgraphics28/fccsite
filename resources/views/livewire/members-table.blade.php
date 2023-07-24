<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Birth Date</th>
                <th>Age</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($records as $row)
                <tr>
                    <td>{{ $row->first_name }} {{ $row->middle_name }} {{ $row->last_name }} {{ $row->ext_name }}</td>
                    <td>{{ $row->gender }}</td>
                    <td>{{ $row->birth_date }}</td>
                    <td></td>
                    <td>{{ $row->contact_number }}</td>
                    <td>{{ $row->address }}</td>
                    <td>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Remove</button>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
