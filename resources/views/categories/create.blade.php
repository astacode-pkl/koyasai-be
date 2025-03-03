@extends('layout.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <form method="post" enctype="multipart/form-data" action="/categories">
                @csrf
                <div class="card-body border-top">
                    <div class="row justify-content-between">
                        <div class="col-12">
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
                        </div>
                    </div>
                </div>
                <div class="p-3 border-top">
                    <div class="action-form">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4 waves-effect waves-light">
                                <i class="ti ti-plus"></i> Add
                            </button>
                            <a href="/categories" class="btn btn-dark px-4 waves-effect waves-light">
                                <i class="ti ti-xbox-x"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
