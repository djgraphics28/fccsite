@extends('layouts.backend')

@section('title', 'Create New Member')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Group</h1>
        <a href="{{ route('groups.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-arrow-left fa-md text-white-50"></i> Back</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4>Create New Group Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('groups.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="name">Group Name</label>
                                <input type="text"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
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
                                    @foreach ($members as $item)
                                        <option value="{{ $item->id }}">{{ $item->first_name ?? "" }} {{ $item->last_name ?? "" }}</option>
                                    @endforeach
                                </select>
                                @error('leader')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary mt-4 float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
