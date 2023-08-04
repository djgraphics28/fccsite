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
                    <th>#</th>
                    <th>Family Name</th>
                    <th>Father</th>
                    <th>Mother</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($records as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->family_name }}</td>
                        <td>{{ $row->fatherData->first_name ?? "" }}</td>
                        <td>{{ $row->motherData->first_name ?? "" }}</td>
                        <td>
                            <a href="{{ route('families.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <a class="btn btn-danger">Remove</a>
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
                    <th>#</th>
                    <th>Family Name</th>
                    <th>Father</th>
                    <th>Mother</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

    {{ $records->links() }}
</div>

@push('scripts')

@endpush
