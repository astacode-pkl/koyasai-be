@extends('layout.app')
@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">

        <div class="card w-100">
            <form method="post" enctype="multipart/form-data" action="/embeds">
                @csrf
                <div class="card-body border-top">
                    <div class="row justify-content-between">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="link" class="control-label col-form-label">link</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror"
                                    id="link" placeholder="Please enter link..." name="link"
                                    value="{{ old('link') }}" Required  />
                                @error('link')
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
                            <a href="/embeds" class="btn btn-dark px-4 waves-effect waves-light">
                                <i class="ti ti-xbox-x"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('script')
    @endpush
@endsection
