@extends('layouts.backend')

@section('title', 'Certificate Generator')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Certificate Generator</h1>
        <a href="{{ route('cert.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-md text-white-50"></i> Add New</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4>Results</h4>
                </div>
                <div class="card-body">
                    @livewire('certificate-template-table')
                </div>
            </div>
        </div>
    </div>
@endsection
