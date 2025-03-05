@extends('layout.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>

    <section class="datatables">
        <!-- ---------------
                                        start DataTable
                                        ---------------- -->
        <div class="card">
            <div class="card-body">

                <div class="mb-2">
                    <div class="d-flex align-items-end flex-column">
                        <a href="/galleries/create"><button class="btn btn-primary"> <i class="ti ti-plus "></i>
                                Create</button>
                        </a>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table border display table-bordered  no-wrap overflow-x-auto">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                <!-- end row -->
                            </thead>
                            <tbody>
                                @foreach ($galleries as $gallery)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a data-bs-toggle="modal" data-bs-target="#imageModal{{ $loop->iteration }}">
                                                <img src="{{ asset('/images/galleries/' . $gallery->image) }}"
                                                    alt="image-galleries" width="80">
                                            </a>
                                        </td>
                                        <td>{{ $gallery->title }}</td>
                                        <td><a href="/galleries/{{ Crypt::encryptString($gallery->id) }}/edit"
                                                class="btn btn-warning  px-4 waves-effect waves-light">
                                                <i class="ti ti-edit "></i> Edit
                                            </a>
                                            </button>
                                            <form action="/galleries/{{ Crypt::encryptString($gallery->id) }}"
                                                method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" onclick="deleteItem(event)" class="btn btn-danger px-4 waves-effect waves-light">
                                                    <i class="ti ti-trash "></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="imageModal{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="imageModalLabel{{ $loop->iteration }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel{{ $loop->iteration }}">
                                                        {{ $gallery->title }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body d-flex justify-content-center">
                                                    <img src="{{ asset('images/galleries/' . $gallery->image) }}"
                                                        alt="img-gallery" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ----------------
                                        end DataTable
                                         ---------------- -->
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