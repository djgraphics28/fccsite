<div>
    <div class="table-responsive">
        <div class="row mb-4">
            <div class="col-md-4">
                <!-- Search Input -->
                <input type="text" class="form-control" wire:model="searchTerm" placeholder="Search...">
            </div>
            <select wire:model="perPage" class="form-control col-2">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="500">500</option>
            </select>

            <select wire:model="sortByGender" class="form-control col-3 ml-3">
                <option value="">All Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            @if ($selectedRows)
                <button wire:click="bulkPrint" class="btn btn-primary ml-3">Print Certificate</button>
            @endif
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center" width="2%"><input type="checkbox" wire:model="selectAll"></th>
                    <th>Image</th>
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
                        <td><input type="checkbox" wire:model.prevent="selectedRows" value="{{ $row->id }}"></td>
                        <td>
                            @if ($row->hasMedia('profile_picture'))
                                <img src="{{ $row->getFirstMediaUrl('profile_picture', 'thumbnail') }}" alt="{{ $row->first_name }}">
                            @else
                                @if ($row->gender == "Male")
                                    <img width="50px" src="{{ asset('assets/img/profile_image/male.png') }}" alt="">
                                @else
                                    <img width="50px" src="{{ asset('assets/img/profile_image/female.png') }}" alt="">
                                @endif
                            @endif
                        </td>
                        <td>{{ $row->first_name }} {{ $row->middle_name }} {{ $row->last_name }} {{ $row->ext_name }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->birth_date }}</td>
                        <td>{{ $row->age }}
                        </td>
                        <td>{{ $row->contact_number }}</td>
                        <td>{{ $row->address }}</td>
                        <td>
                            <a href="{{ route('members.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <a class="btn btn-danger">Remove</a>
                            @if ($row->date_baptized != null || $row->date_baptized != "")
                                <a wire:click="printCertificate({{ $row->id }})" class="btn btn-primary">Print Cert</a>
                            @endif
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
                    <th></th>
                    <th>Image</th>
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
