@extends('layouts.backend')

@section('title', 'Edit Certificate Template')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Certificate Template</h1>
        <a href="{{ route('cert.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-arrow-left fa-md text-white-50"></i> Back</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4>Edit Certificate Template Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('cert.update', $certgen->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="title">Title</label>
                                <input type="text"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror" id="title"
                                    value="{{ $certgen->title }}" name="title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="summernote">Content</label>
                                <textarea id="summernote" name="content">{!! $certgen->content !!}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="summernote">Signatories</label>
                                <div id="inputContainer" class="form-group">
                                    <!-- Initial input field -->
                                    @forelse (json_decode($certgen->signatories, true) as $item)
                                        <div class="col-md-3 mb-2">
                                            <select name="signatories[]" class="form-control">
                                                <option value="">Choose</option>
                                                @forelse ($members as $member)
                                                    <option {{ $item ==  $member->id ? 'selected' : ''}} value="{{ $member->id }}"> {{ $member->first_name }} {{ $member->last_name }}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                        </div>
                                    @empty
                                        <div class="col-md-3 mb-2">
                                            <select name="signatories[]" class="form-control">
                                                <option value="">Choose</option>
                                                @forelse ($members as $member)
                                                    <option value="{{ $member->id }}"> {{ $member->first_name }} {{ $member->last_name }}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                        </div>
                                    @endforelse

                                </div>
                                <button class="btn btn-success" type="button" id="addInput">Add More</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="certificate_background_input">Background Image</label>
                            <input class="form-control form-control-lg" type="file" name="background"
                                id="certificate_background_input">
                            <img class="mt-3" width="500px" id="selected_image"
                                src="{{ $certgen->getFirstMediaUrl('background', 'thumbnail') }}"
                                alt="Selected Certificate Background"
                                style="display: {{ $certgen->hasMedia('background') ? 'block' : 'none' }});">
                        </div>

                        <button class="btn btn-primary mt-4 float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                // ['style', ['style']],
                // ['font', ['bold', 'underline', 'clear']],
                // ['color', ['color']],
                // ['para', ['ul', 'ol', 'paragraph']],
                // ['table', ['table']],
                // ['insert', ['link', 'picture', 'video']],
                // ['view', ['fullscreen', 'codeview', 'help']]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            fontSizes: ['8', '10', '12', '14', '16', '18', '24', '36', '48', '60', '72', '84'],
            lineHeights: ['0.5', '1', '1.15', '1.5', '2', '2.5', '3'],
        });

        $(document).ready(function() {
            $('#addInput').click(function() {
                $('#inputContainer').append(
                    '<div class="col-md-3 mb-2">' +
                        '<select name="signatories[]" class="form-control">' +
                            '<option value="">Choose</option> ' +
                            '@forelse ($members as $member)' +
                                '<option value="{{ $member->id }}"> {{ $member->first_name }} {{ $member->last_name }}</option>' +
                            '@empty' +

                            '@endforelse' +
                        '</select>' +
                    '</div>'
                );
            });
        });
    </script>

    <script>
        document.getElementById('certificate_background_input').addEventListener('change', function(event) {
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
