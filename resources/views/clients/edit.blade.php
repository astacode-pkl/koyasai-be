@extends('layout.app')
@section('content')
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <form method="post" enctype="multipart/form-data" action="/clients/{{ Crypt::encryptString($client->id) }}">
                @method('put')
                @csrf
                <div class="card-body border-top">
                    <div class="row justify-content-between">
                        <div class="col-6">                            
                            <div class="mb-3">
                                <label for="image" class="control-label col-form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" />
                                @error('image')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-center " id="priview">
                            <img src="{{ asset('images/clients/' . $client->image) }}" class="img-fluid rounded"
                                width="250">
                        </div>
                    </div>
                </div>
                <div class="p-3 border-top">
                    <div class="action-form">
                        <div class="text-end">
                            <button type="submit" class="btn btn-info px-4 waves-effect waves-light">
                                <i class="ti ti-device-floppy"></i> Edit
                            </button>
                            <a href="/clients" class="btn btn-dark px-4 waves-effect waves-light">
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
