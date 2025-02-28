@extends('layout.app')
@section('content')
<h1>Home page</h1>
    <div class="card p-4 overflow-x-auto">
            <table id="example_dataTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                </td><td>
                </td><td>
                </td><td>
                </td><td>
                </td><td>
                </td><td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
    </div>
    @push('script')
    <script src="{{asset('js/dataTables.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap5.js')}}"></script>

        <script>
        let table = new DataTable('#example_dataTable');
        </script>
        scrip
    @endpush
    @push('style')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.css')}}" />
    @endpush
@endsection