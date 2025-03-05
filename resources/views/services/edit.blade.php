@extends('layout.app')
@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">

        <div class="card w-100">
            <form method="post" enctype="multipart/form-data" action="/services/{{ Crypt::encryptString($service->id) }}">
                @method('put')
                @csrf
                <div class="card-body border-top">
                    <div class="row justify-content-between">
                        <div class="col-12">

                            <div class="mb-3">
                                <label for="icon"
                                    class="control-label col-form-label @error('icon') is-invalid @enderror">icon</label>
                                <div class=" d-flex gap-3">
                                    <textarea type="text" class="form-control @error('icon') is-invalid @enderror" id="input-icon" name="icon"
                                        placeholder="please enter text svg for icon you can find on website heroicons.com">{{ $service->icon }}</textarea>
                                    @error('icon')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <div class="d-flex justify-content-center align-items-center w-50 " id="preview-icon"
                                        style="max-width: 50px; ">
                                        {!! $service->icon !!}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="control-label col-form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" placeholder="Please enter title..." name="title"
                                    value="{{ $service->title }}" Required />
                                @error('title')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="control-label col-form-label">Description</label>
                                <textarea class="form-control @error('title') is-invalid @enderror" name="description" id="textarea"
                                    placeholder="Please enter description...">{{ $service->description }}</textarea>
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
                                <i class="ti ti-circle-check"></i> Update
                            </button>
                            <a href="/services" class="btn btn-dark px-4 waves-effect waves-light">
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
