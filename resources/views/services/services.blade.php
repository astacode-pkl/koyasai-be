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
                        <a href="/services/create"><button class="btn btn-primary"> <i class="ti ti-plus "></i>
                                Create</button>
                        </a>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table border display table-bordered  no-wrap">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th>No</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                <!-- end row -->
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! $service->icon !!}</td>
                                        <td>{{ $service->title }}</td>
                                        <td id="description">{{ $service->description }}</td>
                                        <td><a href="/services/{{ Crypt::encryptString($service->id) }}/edit"
                                                class="btn btn-warning  px-4 waves-effect waves-light">
                                                <i class="ti ti-edit "></i> Edit
                                            </a>
                                            </button>
                                            <form action="/services/{{ Crypt::encryptString($service->id) }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger px-4 waves-effect waves-light">
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
            <!-- ----------------
                                end DataTable
                                 ---------------- -->
    </section>
    @push('script')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll("#description").forEach(function(desc) {
                    const fullText = desc.textContent.trim();
                    const maxLength = 30; // Panjang maksimum sebelum dipersingkat

                    if (fullText.length > maxLength) {
                        const shortText = fullText.substring(0, maxLength) + "...";
                        desc.innerHTML = `<span class="short">${shortText}</span>
                              <span class="full" style="display: none;">${fullText}</span>
                              <a href="#" class="toggle-text">Read more</a>`;

                        desc.querySelector(".toggle-text").addEventListener("click", function(e) {
                            e.preventDefault();
                            const shortSpan = desc.querySelector(".short");
                            const fullSpan = desc.querySelector(".full");

                            if (shortSpan.style.display === "none") {
                                shortSpan.style.display = "inline";
                                fullSpan.style.display = "none";
                                this.textContent = "Read more";
                            } else {
                                shortSpan.style.display = "none";
                                fullSpan.style.display = "inline";
                                this.textContent = "Show less";
                            }
                        });
                    }
                });
            });
        </script>
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
