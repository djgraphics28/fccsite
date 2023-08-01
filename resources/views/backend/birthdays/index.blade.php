@extends('layouts.backend')

@section('title', 'List of Birthday Celebrators')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Birthday Celebrators</h1>
        {{-- <a href="{{ route('families.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-md text-white-50"></i> Add New</a> --}}
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4>Results</h4>
                </div>
                <div class="card-body">
                    <h1>Birthday Celebrators by Month</h1>
                    @foreach ($membersByMonth as $monthName => $members)
                        <h2>{{ $monthName }}</h2>
                        <ul>
                            @foreach ($members as $member)
                                <li>{{ $member->first_name }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
