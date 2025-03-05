@extends('layout.app') @section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('update.heroes', $hero->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label class="control-label mb-2" for="image">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                class="form-control  @error('image') is-invalid  @enderror" id="image"
                                                aria-describedby="inputGroupFileAddon01" name="image">
                                            @error('image')
                                                <div id="validationServer04Feedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 d-none">
                                    <label class="control-label mb-2" for="position">Position</label>
                                    <input type="number" id="position"
                                        class="form-control @error('position') is-invalid @enderror"
                                        value="{{ $hero->position }}" placeholder="Please enter position..."
                                        name="position">
                                    @error('position')
                                        <div id="validationServer04Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-center border-dark-subtle"
                                id="preview">
                                <img src="{{ asset('images/heroes/' . $hero->image) }}" class="img-fluid rounded"
                                    width="250">
                            </div>
                        </div>
                        <div class="form-actions text-end mt-3">
                            <div class="card-body border-top">
                                <button type="submit" class="btn btn-primary  px-4">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-circle-check"></i> Update
                                    </div>
                                </button>
                                <a href="/heroes/">
                                    <button type="button" class="btn btn-dark  px-4 ms-2 text-white">
                                        <div class="d-flex align-items-center">
                                            <i class="ti ti-circle-x me"></i> Cancel
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ---------------------
                                                                                                                            end Person Info
                                                                                                                        ---------------- -->
        </div>
    </div>
    @push('script')
        <script>
            document.getElementById('image').addEventListener('change', function(event) {
                let preview = document.getElementById('preview');
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
