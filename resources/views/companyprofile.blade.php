@extends('layout.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>
    <div class="card">
        <form action="/company-profile/{{ Crypt::encryptString($companyprofile->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="control-label col-form-label" for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ $companyprofile->name }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="control-label col-form-label" for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                value="{{ $companyprofile->phone }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="control-label col-form-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ $companyprofile->email }}">
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label col-form-label" for="youtube">YouTube</label>
                            <input type="text" id="youtube" name="youtube" class="form-control"
                                value="{{ $companyprofile->youtube }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label col-form-label" for="ig">Instagram Link</label>
                            <input type="text" id="ig" name="instagram" class="form-control"
                                value="{{ $companyprofile->instagram }}">
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label col-form-label" for="wa">WhatsApp Link</label>
                            <input type="text" id="wa" name="whatsapp" class="form-control"
                                value="{{ $companyprofile->whatsapp }}">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label col-form-label" for="facebook">Facebook Link</label>
                            <input type="text" id="facebook" name="facebook" class="form-control"
                                value="{{ $companyprofile->facebook }}">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label col-form-label" for="history">History</label>
                            <textarea class="form-control" name="history" id="floatingTextarea">{{ $companyprofile->history }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label col-form-label">Brief History</label>
                            <textarea class="form-control" name="simple_history" id="floatingTextarea">{{ $companyprofile->simple_history }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label col-form-label">Address</label>
                            <textarea class="form-control" name="address" id="floatingTextarea">{{ $companyprofile->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label col-form-label">Map</label>
                            <textarea class="form-control" name="map" id="floatingTextarea">{{ $companyprofile->map }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex pt-3 gap-3">
                    <div class="mb-3">
                        <label class="control-label col-form-label" for="address">Logo Mark (Graphical logo)</label>
                        <img src="{{ asset('images/companyprofile/' . $companyprofile->logo_mark) }}"
                            class="img-fluid rounded-top  w-xs-100 d-block my-3" alt="" id="preview"
                            style="max-width:100px;" />
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="fileInput"
                                    class="form-control @error('logo_mark') is-invalid @enderror " name="logo_mark"
                                    id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                @error('logo_mark')
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="control-label col-form-label" for="address">Logo Type (Text logo)</label>
                        <img src="{{ asset('images/companyprofile/' . $companyprofile->logo_type) }}"
                            class="img-fluid rounded-top w-xs-100 d-block my-3" alt="" id="preview"
                            style="max-width:100px;" />
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="fileInput"
                                    class="form-control @error('logo_type') is-invalid @enderror " name="logo_type"
                                    id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                @error('logo_type')
                                    <div id="validationServer04Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions text-end">
                    <div class="card-body border-top">
                        <button type="submit" class="btn btn-primary px-4 waves-effect waves-light" onclick="Decision(event)">
                                <i class="ti ti-device-floppy"></i> Save
                            </button>

                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <script src="{{ asset('js/imagePreview.js') }}"></script>
    @endpush
@endsection
