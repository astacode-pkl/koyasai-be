@extends('layout.app')
@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">

        <div class="card w-100">
            <form method="post" enctype="multipart/form-data" action="/galleries">
                @csrf
                <div class="card-body border-top">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            
                            <div class="mb-3">
                                <label for="image"
                                    class="control-label col-form-label ">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                                    value="{{ old('image') }}" Required />
                                @error('image')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
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
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-center border-dashed border-dark-subtle"
                            id="priview">
                            <div class="">Image preview here</div>
                        </div>
                    </div>
                </div>
                <div class="p-3 border-top">
                    <div class="action-form">
                        <div class="text-end">
                            <button type="submit" class="btn btn-info px-4 waves-effect waves-light">
                                <i class="ti ti-device-floppy"></i> Save
                            </button>
                            <a href="/galleries" class="btn btn-dark px-4 waves-effect waves-light">
                                <i class="ti ti-xbox-x"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('script')
        <script>
            document.getElementById('image').addEventListener('change', function(event) {
                let preview = document.getElementById('priview');
                preview.classList.remove('border-dashed');
                let file = event.target.files[0];

                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" width="250">`;
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.innerHTML = '<div class="">Image preview here</div>';
                }
            });
        </script>
    @endpush
@endsection
