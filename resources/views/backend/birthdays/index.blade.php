@extends('layouts.backend')

@section('title', 'List of Birthday Celebrators')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h3 mb-0 text-gray-800">Birthday Celebrators</h4>
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
                    <h4>Birthday Celebrators by Month</h4>
                    @foreach ($membersByMonth as $monthName => $members)
                        <hr>
                        <h2>{{ $monthName }}</h2>
                        <div class="row ml-1">
                            @foreach ($members as $member)
                                <div class="col-md-2 mb-2">
                                    <div class="card">
                                        @if ($row->hasMedia('profile_picture'))
                                            <img class="card-img-top"
                                                src="{{ $member->getFirstMediaUrl('profile_picture', 'thumbnail') }}"
                                                alt="{{ $member->first_name }}">
                                        @else
                                            @if ($member->gender == 'Male')
                                                <img class="card-img-top"  src="{{ asset('assets/img/profile_image/male.png') }}"
                                                    alt="">
                                            @else
                                                <img class="card-img-top" src="{{ asset('assets/img/profile_image/female.png') }}"
                                                    alt="">
                                            @endif
                                        @endif

                                        <div class="card-body">
                                            <h5 class="card-title">{{ $member->first_name }}</h5>
                                            <span>Birth Date: <b>{{ $member->birth_date }}</b></span>
                                            <span>Age: <b>{{ $member->age }}</b></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
