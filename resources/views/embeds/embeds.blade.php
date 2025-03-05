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
                        <a href="/embeds/create"><button class="btn btn-primary"> <i class="ti ti-plus "></i>
                                Create</button>
                        </a>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table border display table-bordered  no-wrap">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th>No</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                                <!-- end row -->
                            </thead>
                            <tbody>
                                @foreach ($embeds as $embed)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $embed->link }}</td>
                                        <td class="text-center button-td">

                                            <a href="/embeds/{{ Crypt::encryptString($embed->id) }}/edit"
                                                class="btn border btn-sm waves-effect waves-light">
                                                <i class="ti ti-edit "></i>
                                            </a>
                                            </button>
                                            <form action="/embeds/{{ Crypt::encryptString($embed->id) }}" method="POST"
                                                class="d-inline ">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn border btn-sm waves-effect waves-light">
                                                    <i class="ti ti-trash "></i>
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
            <!-- ----------------
                                            end DataTable
                                             ---------------- -->
    </section>
    @push('script')
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
        <style>
            .button-td {
                white-space: nowrap
            }
        </style>
    @endpush
@endsection
