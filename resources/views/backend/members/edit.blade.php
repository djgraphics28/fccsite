@extends('layouts.backend')

@section('title', 'Edit Member')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Member</h1>
        <a href="{{ route('members.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-arrow-left fa-md text-white-50"></i> Back</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4>Edit Member Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="profile_picture_input">Image</label>
                                    @if ($member->hasMedia('profile_picture'))
                                        <img class="img-thumbnail" id="selected_image"
                                            src="{{ $member->getFirstMediaUrl('profile_picture', 'thumbnail') }}"
                                            alt="Selected Profile Picture">
                                    @else
                                        @if ($member->gender == 'Male')
                                            <img class="img-thumbnail" id="selected_image" src="{{ asset('assets/img/profile_image/male.png') }}"
                                                alt="">
                                        @else
                                            <img class="img-thumbnail" id="selected_image" src="{{ asset('assets/img/profile_image/female.png') }}"
                                                alt="">
                                        @endif
                                    @endif

                                    <input class="form-control form-control-lg" type="file" name="profile_picture"
                                        id="profile_picture_input">

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="isFirstTime">First Timer?</label>
                                    <select class="form-control form-control-lg" id="isFirstTime" name="isFirstTime">
                                        <option value="">Select option</option>
                                        <option {{ $member->is_first_time == 1 ? 'selected' : '' }} value="1">Yes
                                        </option>
                                        <option {{ $member->is_first_time == 0 ? 'selected' : '' }} value="0">No
                                        </option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="firstName">First Name</label>
                                        <input type="text"
                                            class="form-control form-control-lg @error('firstName') is-invalid @enderror"
                                            id="firstName" name="firstName" value="{{ $member->first_name ?? '' }}">

                                        @error('firstName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="middleName">Middle Name</label>
                                        <input type="text" class="form-control form-control-lg" id="middleName"
                                            name="middleName" value="{{ $member->middle_name ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6  mb-3 mb-sm-0">
                                        <label for="lastName">Last Name</label>
                                        <input type="text"
                                            class="form-control form-control-lg @error('lastName') is-invalid @enderror"
                                            id="lastName" name="lastName" value="{{ $member->last_name ?? '' }}">
                                        @error('lastName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="extName">Extension Name (ex. JR,SR.)</label>
                                        <input type="text" class="form-control form-control-lg" id="extName"
                                            name="extName" value="{{ $member->ext_name ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4  mb-3 mb-sm-0">
                                        <label for="title">Title (optional)</label>
                                        <input type="text" class="form-control form-control-lg" id="title"
                                            name="title" value="{{ $member->title ?? '' }}">
                                    </div>
                                    <div class="col-sm-4  mb-3 mb-sm-0">
                                        <label for="nickname">Nickname (optional)</label>
                                        <input type="text" class="form-control form-control-lg" id="nickname"
                                            name="nickname" value="{{ $member->nickname ?? '' }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="gender">Gender</label>
                                        <select class="form-control form-control-lg @error('gender') is-invalid @enderror"
                                            id="gender" name="gender">
                                            <option value="">Select option</option>
                                            <option {{ $member->gender == 'Male' ? 'selected' : '' }} value="Male">Male
                                            </option>
                                            <option {{ $member->gender == 'Female' ? 'selected' : '' }} value="Female">
                                                Female
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birthDate">Birth Date</label>
                                    <input type="date"
                                        class="form-control form-control-lg @error('birthDate') is-invalid @enderror"
                                        id="birthDate" name="birthDate" value="{{ $member->birth_date ?? '' }}">
                                    @error('birthDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="contactNumber">Contact Number</label>
                                    <input type="number" class="form-control form-control-lg" id="contactNumber"
                                        name="contactNumber" value="{{ $member->contact_number ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control form-control-lg" id="position"
                                        value="{{ $member->position ?? '' }}" name="position">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" cols="30" rows="3" name="address">{{ $member->address ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="email">EmailAddress</label>
                                    <input type="email" class="form-control form-control-lg" id="email"
                                        placeholder="example@gmail.com" value="{{ $member->email ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="dateBaptized">Date Baptized</label>
                                    <input type="date" class="form-control form-control-lg" id="dateBaptized"
                                        name="dateBaptized" value="{{ $member->date_baptized ?? '' }}">

                                </div>
                            </div>
                        </div>


                        <button class="btn btn-success mt-4 float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('profile_picture_input').addEventListener('change', function(event) {
            const fileInput = event.target;
            const selectedImage = document.getElementById('selected_image');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                    selectedImage.style.display = 'block'; // Show the selected image
                }

                reader.readAsDataURL(fileInput.files[0]);
            } else {
                selectedImage.src = '';
                selectedImage.style.display = 'none'; // Hide the selected image
            }
        });
    </script>
@endpush
