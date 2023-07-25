<div>
    <div class="table-responsive">
        <div class="row mb-4">
            <div class="col-md-4">
                <!-- Search Input -->
                <input type="text" class="form-control" wire:model="searchTerm" placeholder="Search...">
            </div>
        </div>
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
                        <td>{{ $row->first_name }} {{ $row->middle_name }} {{ $row->last_name }} {{ $row->ext_name }}
                        </td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->birth_date }}</td>
                        <td>{{ $row->birth_date ? date_diff(date_create($row->birth_date), date_create('today'))->y . ' years old' : '' }}
                        </td>
                        <td>{{ $row->contact_number }}</td>
                        <td>{{ $row->address }}</td>
                        <td>
                            <button class="btn btn-warning">Edit</button>
                            <button class="btn btn-danger">Remove</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">
                            <center>No record found</center>
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Birth Date</th>
                    <th>Age</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>


    {{ $records->links() }}
</div>
