@extends('layout.app')
@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">

        <div class="card w-100">
            <form method="post" enctype="multipart/form-data" action="/services">
                @csrf
                <div class="card-body border-top">
                    <div class="row justify-content-between">
                        <div class="col-12">

                            <div class="mb-3">
                                <label for="icon" class="control-label col-form-label ">icon</label>
                                <div class=" d-flex gap-2">
                                    <textarea type="text" class="form-control @error('icon') is-invalid @enderror " id="input-icon" name="icon"
                                        placeholder="please enter text svg for icon you can find on website heroicons.com" required></textarea>
                                    <div class="d-flex form-control justify-content-center align-items-center w-50 " id="preview-icon"
                                        style="max-width: 50px; ">
                                        icon
                                    </div>
                                </div>
                                @error('icon')
                                    
                                <div >
                                    <span class="text-danger"><small>{{ $message }} </small> </span>
                                </div>
                                @enderror
                            
                            </div>
                            <div class="mb-3">
                                <label for="title" class="control-label col-form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" placeholder="Please enter title..." name="title"
                                    value="{{ old('title') }}" Required />
                                @error('title')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="control-label col-form-label">Description</label>
                                <textarea class="form-control @error('title') is-invalid @enderror" name="description" id="textarea"
                                    placeholder="Please enter description...">{{ old('description') }}</textarea>
                                @error('title')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3 border-top">
                    <div class="action-form">
                        <div class="text-end">
                            <button type="submit" class="btn btn-info px-4 waves-effect waves-light">
                                <i class="ti ti-device-floppy"></i> Save
                            </button>
                            <a href="/news" class="btn btn-dark px-4 waves-effect waves-light">
                                <i class="ti ti-xbox-x"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('script')
        <script src="{{ asset('template/back') }}/dist/libs/jquery/dist/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#input-icon').on('keyup', function() {
                    $('#preview-icon').html($(this).val());
                    $('#preview-icon').removeClass('border-dashed');
                });
            });
        </script>
    @endpush
@endsection
