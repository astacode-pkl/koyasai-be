@extends('layout.app')
@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">

        <div class="card w-100">
            <form method="post" enctype="multipart/form-data" action="/news">
                @csrf
                <div class="card-body border-top">
                    <div class="row justify-content-between">
                        <div class="col-11">

                            <div class="mb-3">
                                <label for="icon"
                                    class="control-label col-form-label @error('icon') is-invalid @enderror">icon</label>
                                <div class=" d-flex gap-3">
                                    <textarea type="file" class="form-control" id="icon" name="icon" value="{{ old('icon') }}"
                                        placeholder="please enter icon you can find on website heroicons.com"></textarea>
                                    @error('icon')
                                        <div class="invalid-feedback">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <div class="flex justify-content-center align-content-center">jds</div>
                                </div>
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
                                <textarea class="form-control @error('title') is-invalid @enderror" name="description" id="textarea">{{ old('description') }}</textarea>
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
