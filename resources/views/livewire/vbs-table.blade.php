<div>
    <div class="table-responsive">
        <div class="row mb-4">
            <div class="col-md-3 mb-2">
                <!-- Search Input -->
                <input type="text" class="form-control" wire:model="searchTerm" placeholder="Search...">
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
                <select wire:model="sortByAgeRange" class="form-control mr-2">
                    <option value="">Age range (All)</option>
                    <option value="4 - 6">4 - 6</option>
                    <option value="7 - 9">7 - 9</option>
                    <option value="10 - 12">10 - 12</option>
                </select>
            </div>
            <div class="col-md-4 mb-2">
                <button wire:click="showCertModal" class="btn btn-primary">Generate Certificate</button>
                <button wire:click="showMembers" class="btn btn-success">Add Member</button>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center" width="2%"><input type="checkbox" wire:model="selectAll"></th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($records as $row)
                    <tr>
                        <td><input type="checkbox" wire:model.prevent="selectedRows" value="{{ $row->member_id }}"></td>
                        <td>
                            @if ($row->member->hasMedia('profile_picture'))
                                <img width="50px" src="{{ $row->member->getFirstMediaUrl('profile_picture', 'thumbnail') }}"
                                    alt="{{ $row->member->first_name }}">
                            @else
                                @if ($row->member->gender == 'Male')
                                    <img width="50px" src="{{ asset('assets/img/profile_image/male.png') }}"
                                        alt="">
                                @else
                                    <img width="50px" src="{{ asset('assets/img/profile_image/female.png') }}"
                                        alt="">
                                @endif
                            @endif
                        </td>
                        <td>{{ $row->member->first_name }} {{ $row->member->last_name }}</td>
                        <td>{{ $row->member->gender }}</td>
                        <td>{{ $row->member->age }}</td>
                        <td>
                            {{-- <a wire:click="members" class="btn btn-primary">Members</a>
                            <a href="{{ route('groups.edit', $row->id) }}" class="btn btn-warning">Edit</a> --}}
                            <button wire:click="destroy({{ $row->id }})" class="btn btn-danger">Remove</button>
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
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

    {{ $records->links() }}

    <!-- Add Member -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Kids For Jesus Lists</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" width="2%">#</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kids as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                    <td>{{ $row->age }}</td>
                                    <td><button wire:click="addToVbs({{ $row->id }})"
                                            class="btn btn-success">ADD</button></td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{-- @if ($updateMode == true)
                <button wire:click.prevent="update()" class="btn btn-success">Update</button>
            @else
                <button wire:click.prevent="submit()" class="btn btn-primary">Save</button>
            @endif --}}
                </div>
            </div>
        </div>
    </div>

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
        window.addEventListener('show-add-modal', event => {
            $('#addModal').modal('show');
        })

        window.addEventListener('hide-add-modal', event => {
            $('#addModal').modal('hide');
        })

        window.addEventListener('show-cert', event => {
            $('#printModalOption').modal('show');
        })

        window.addEventListener('hide-cert', event => {
            $('#printModalOption').modal('hide');
        })
    </script>
@endpush
