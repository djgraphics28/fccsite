@extends('layouts.backend')

@section('title', 'Edit Member')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Group</h1>
        <a href="{{ route('groups.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-arrow-left fa-md text-white-50"></i> Back</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4>Edit Group Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('groups.update', $group->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="name">Group Name</label>
                                <input type="text"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" value="{{ $group->name }}"
                                    name="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="leader">Leader</label>
                                <select class="form-control form-control-lg @error('leader') is-invalid @enderror"
                                    id="leader" name="leader">
                                    <option value="">Select Leader</option>
                                    @foreach ($members  as $item)
                                        <option {{ $item->id == $group->member_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->first_name ?? "" }} {{ $item->last_name ?? "" }}</option>
                                    @endforeach
                                </select>
                                @error('leader')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-success mt-4 float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
