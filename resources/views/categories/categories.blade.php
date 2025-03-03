@extends('layout.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>

    <section class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-content-center">
                        <h5 class="mb-0">Categories</h5>
                        <a href="/categories/create"><button class="btn btn-primary"> <i class="ti ti-plus "></i>
                                Create</button> </a>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table table-bordered no-wrap">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                <!-- end row -->
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>
                                            <a href="/categories/{{ Crypt::encryptString($category->id) }}/edit"
                                                class="btn btn-warning  px-4 waves-effect waves-light">
                                                <i class="ti ti-edit "></i> Edit
                                            </a>
                                            </button>
                                            <form action="/categories/{{ Crypt::encryptString($category->id) }}"
                                                method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger px-4 waves-effect waves-light"
                                                    onclick="deleteItem(event)">
                                                    <i class="ti ti-trash "></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <!-- datatable -->
        <script src="{{ asset('template/backend') }}/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('template/backend') }}/dist/js/datatable/datatable-basic.init.js"></script>
    @endpush
    @push('style')
        <!-- --------------------------------------------------- -->
        <!-- Datatable -->
        <!-- --------------------------------------------------- -->
        <link rel="stylesheet"
            href="{{ asset('template/backend') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    @endpush
@endsection
