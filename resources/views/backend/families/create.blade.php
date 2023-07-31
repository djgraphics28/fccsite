@extends('layouts.backend')

@section('title', 'Create New Member')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Family</h1>
        <a href="{{ route('groups.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-arrow-left fa-md text-white-50"></i> Back</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4>Create New Family Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('families.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="family_name">Family Name</label>
                                <input type="text"
                                    class="form-control form-control-lg @error('family_name') is-invalid @enderror" id="family_name"
                                    name="family_name">

                                @error('family_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label for="father">Father</label>
                                <select class="form-control form-control-lg"
                                    id="father" name="father">
                                    <option value="">Select Father</option>
                                    @foreach ($members as $item)
                                        <option value="{{ $item->id }}">{{ $item->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="mother">Mother</label>
                                <select class="form-control form-control-lg"
                                    id="father" name="mother">
                                    <option value="">Select Mother</option>
                                    @foreach ($members as $item)
                                        <option value="{{ $item->id }}">{{ $item->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary mt-4 float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
