@extends('layout.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <form method="post" enctype="multipart/form-data" action="/catalogs/{{ Crypt::encryptString($catalog->id) }}">
                @method('put')
                @csrf
                <div class="card-body border-top">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name" class="control-label col-form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" placeholder="Please enter name..." name="name"
                                    value="{{ $catalog->name }}" required />
                                @error('name')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="price" class="control-label col-form-label">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="price" placeholder="Please enter price..." name="price"
                                    value="{{ $catalog->price }}" required />
                                @error('price')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="control-label col-form-label" for="inlineFormCustomSelect">Category</label>
                            <select class="form-select  @error('category_id') is-invalid @enderror" name="category_id"
                                id="inlineFormCustomSelect" required>
                                <option value="">Choose: Category</option>
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id === $catalog->category_id ? 'selected' : '' }}>{{ $category->title }}
                                    </option>
                                @empty
                                    <option value="">Category not found</option>
                                @endforelse
                            </select>
                            @error('category_id')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="control-label col-form-label">Description</label>
                                <textarea class="form-control" name="description" id="floatingTextarea" placeholder="Please enter description...">{{ $catalog->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="image" class="control-label col-form-label ">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" value="{{ $catalog->image }}" />
                                @error('image')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-center border-dark-subtle"
                            id="preview">
                            <img src="{{ asset('images/catalogs/' . $catalog->image) }}" class="img-fluid rounded"
                                width="250">
                        </div>
                    </div>
                </div>
                <div class="p-3 border-top">
                    <div class="action-form">
                        <div class="text-end">
                            <button type="submit" class="btn btn-info px-4 waves-effect waves-light">
                                <i class="ti ti-circle-check"></i> Update
                            </button>
                            <a href="/catalogs" class="btn btn-dark px-4 waves-effect waves-light">
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
                let preview = document.getElementById('preview');
                let file = event.target.files[0];

                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" width="250">`;
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.classList.add('border-dashed');
                    preview.innerHTML = '<div class="">Image preview here</div>';
                }
            });
        </script>
    @endpush
@endsection
