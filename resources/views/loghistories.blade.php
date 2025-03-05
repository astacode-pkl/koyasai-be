@extends('layout.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>

    <section class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table border display table-bordered no-wrap d-block overflow-x-auto">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>User Action</th>
                                    <th>Subject</th>
                                    <th>Time</th>
                                    <th>Old Data</th>
                                    <th>New Data</th>
                                    <th>Action</th>
                                </tr>
                                <!-- end row -->
                            </thead>
                            <tbody>
                                @foreach ($loghistories as $loghistory)
                                    <tr id="{{ $loop->iteration }}" class="gradeC">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $loghistory->causer_name }}</td>
                                        <td>{{ $loghistory->event }}</td>
                                        <td>{{ $loghistory->subject_type }}</td>
                                        <td>{{ $loghistory->created_at }}</td>
                                        <td>{{ !empty($loghistory->properties['old']) ? json_encode($loghistory->properties['old']) : '-' }}
                                        </td>
                                        <td>{{ !empty($loghistory->properties['attributes']) ? json_encode($loghistory->properties['attributes']) : '-' }}
                                        </td>
                                        <td>
                                            <form action="/log-histories/{{ Crypt::encryptString($loghistory->id) }}"
                                                method="POST" class="d-inline" id="form_delete">

                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" id="btn_delete"
                                                    onclick="deleteItem(event)">
                                                    <i class="ti ti-trash fs-5"></i></button>
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
