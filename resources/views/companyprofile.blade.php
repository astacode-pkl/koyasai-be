@extends('layout.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>
    <div class="card">
        <form action="/company-profile/{{ Crypt::encryptString($companyProfile->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="row pt-3">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="control-label" for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ $companyProfile->name }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="control-label" for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                value="{{ $companyProfile->phone }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="control-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ $companyProfile->email }}">
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label" for="youtube">YouTube</label>
                            <input type="text" id="youtube" name="youtube" class="form-control"
                                value="{{ $companyProfile->youtube }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label" for="ig">Instagram Link</label>
                            <input type="text" id="ig" name="instagram" class="form-control"
                                value="{{ $companyProfile->instagram }}">
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label" for="wa">WhatsApp Link</label>
                            <input type="text" id="wa" name="whatsapp" class="form-control"
                                value="{{ $companyProfile->whatsapp }}">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label" for="facebook">Facebook Link</label>
                            <input type="text" id="facebook" name="facebook" class="form-control"
                                value="{{ $companyProfile->facebook }}">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label" for="history">History</label>
                            <textarea class="form-control" name="history" id="floatingTextarea">{{ $companyProfile->history }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label">Brief History</label>
                            <textarea class="form-control" name="simple_history" id="floatingTextarea">{{ $companyProfile->simple_history }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label">Address</label>
                            <textarea class="form-control" name="address" id="floatingTextarea">{{ $companyProfile->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label">Map</label>
                            <textarea class="form-control" name="map" id="floatingTextarea">{{ $companyProfile->map }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex pt-3 gap-3">
                    <div class="mb-3">
                        <label class="control-label" for="address">Logo Mark (Graphical logo)</label>
                        <img src="{{ asset('images/companyprofile/' . $companyProfile->logo_mark) }}"
                            class="img-fluid rounded-top  w-xs-100 d-block my-3" alt="" id="preview"
                            style="max-width:230px;" />
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
                        <label class="control-label" for="address">Logo Type (Text logo)</label>
                        <img src="{{ asset('images/companyprofile/' . $companyProfile->logo_type) }}"
                            class="img-fluid rounded-top w-xs-100 d-block my-3" alt="" id="preview"
                            style="max-width:230px;" />
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
