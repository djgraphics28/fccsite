<div>
    <div class="table-responsive">
        <div class="row mb-4">
            <div class="col-md-4 mb-2">
                <!-- Search Input -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" wire:model="searchTerm" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" wire:click="clearSearch" type="button">Clear</button>
                    </div>
                  </div>
                {{-- <input type="text" class="form-control" wire:model="searchTerm" placeholder="Search..."> --}}
            </div>
            <div class="col-md-2 mb-2">
                <select wire:model="perPage" class="form-control">
                    <option value="5">5 rows</option>
                    <option value="10">10 rows</option>
                    <option value="25">25 rows</option>
                    <option value="50">50 rows</option>
                    <option value="100">100 rows</option>
                    <option value="500">500 rows</option>
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <select wire:model="sortByGender" class="form-control">
                    <option value="">All Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-md-3">
                <button wire:click="showCertModal" class="btn btn-primary">Print Certificate</button>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center" width="2%"><input type="checkbox" wire:model="selectAll"></th>
                    <th>Image</th>
                    <th wire:click="sortBy('last_name')">Name
                        @if ($sortColumn === 'last_name')
                            @if ($sortDirection === 'asc')
                                <i class="fas fa-caret-up"></i>
                            @else
                                <i class="fas fa-caret-down"></i>
                            @endif
                        @endif
                    </th>
                    <th>Gender</th>
                    <th>Birth Date</th>
                    <th wire:click="sortBy('birth_date')">Age
                        @if ($sortColumn === 'birth_date')
                            @if ($sortDirection === 'asc')
                                <i class="fas fa-caret-up"></i>
                            @else
                                <i class="fas fa-caret-down"></i>
                            @endif
                        @endif
                    </th>
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
                                <img width="50px" src="{{ $row->getFirstMediaUrl('profile_picture', 'thumbnail') }}"
                                    alt="{{ $row->first_name }}">
                            @else
                                @if ($row->gender == 'Male')
                                    <img width="50px" src="{{ asset('assets/img/profile_image/male.png') }}"
                                        alt="">
                                @else
                                    <img width="50px" src="{{ asset('assets/img/profile_image/female.png') }}"
                                        alt="">
                                @endif
                            @endif
                        </td>
                        <td>{{ $row->last_name }}, {{ $row->first_name }} {{ $row->ext_name }} {{ $row->middle_name }}
                        </td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->birth_date }}</td>
                        <td>{{ $row->age }}
                        </td>
                        <td>{{ $row->contact_number }}</td>
                        <td>{{ $row->address }}</td>
                        <td>
                            <a href="{{ route('members.edit', $row->id) }}" class="btn btn-warning btn-sm"><i
                                    class="fas fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            @if ($row->date_baptized != null || $row->date_baptized != '')
                                <a wire:click="printCertificate({{ $row->id }})" class="btn btn-primary btn-sm"><i
                                        class="fas fa-print"></i></a>
                            @endif
                            <a href="{{ route('e-signature', $row->id) }}" target="_blank"
                                class="btn btn-info btn-sm"><i class="fa fa-link" aria-hidden="true"></i></a>

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

    <!-- cert Options -->
    <div class="modal fade" id="printModalOption" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Choose Certificate Template</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        @forelse ($certTemp as $temp)
                            <div class="form-check">
                                <input class="form-check-input" wire:model="certOption" value="{{ $temp->id }}"
                                    type="radio" name="option" id="option{{ $temp->id }}">
                                <label class="form-check-label" for="option{{ $temp->id }}">
                                    {{ $temp->title }}
                                </label>
                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button wire:click="bulkPrint" class="btn btn-primary">Print</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('show-cert', event => {
            $('#printModalOption').modal('show');
        })

        window.addEventListener('hide-cert', event => {
            $('#printModalOption').modal('hide');
        })
    </script>
@endpush
